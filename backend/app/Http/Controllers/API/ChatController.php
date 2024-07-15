<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Message;
use App\Models\Message as chat;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ListChatUserResource;
use App\Models\Frontuser;
use Illuminate\Support\Collection;

class ChatController extends Controller
{
    //
    public function index(Request $request)
    {
        return event(new Message($request->input('sender_id'), $request->input('receiver_id'), $request->input('text'), $request->input('images')));
    }

    public function sendMessage(Request $request)
    {
        event(new Message($request->input('send_id'), $request->input('receiver_id'), $request->input('text'), $request->input('images')));
    }

    public function uploadMultipleImages(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imagesPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage'), $imageName);
                $imagesPaths[] = $imageName;
            }
            $message = chat::create([
                "sender_id" => $request->user()->id,
                "receiver_id" => $id,
                "images" => implode(',', $imagesPaths),
            ]);
            event(new Message($request->input('text'), $request->input('imagesPaths')));
            return response()->json([
                'success' => true,
                'data' => $message,
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'No images were uploaded.',
        ], 400);
    }

    public function sendTextMessage(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);
        try {
            $message = chat::create([
                "sender_id" => $request->user()->id,
                "receiver_id" => $request->input('receiver_id'),
                "text" => $request->input('text'),
            ]);
            event(new Message($request->input('text'), $request->input('imagesPaths')));
            return response()->json([
                'success' => true,
                'data' => $message,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e,
            ], 200);
        }
    }

    public function getUser(Request $request)
    {
        $data = DB::table('messages')
            ->select('sender_id', 'receiver_id', DB::raw('MIN(text) as text'), DB::raw('MIN(images) as images'), DB::raw('MIN(created_at) as created_at'))
            ->where('sender_id', $request->user()->id)
            ->orWhere('receiver_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->groupBy('sender_id', 'receiver_id')
            ->get();
        $data = ListChatUserResource::collection($data);
        $array = [];
        foreach ($data as $item) {
            $item->sender_id = DB::table('frontusers')->where('id', $item->sender_id)->get();
            $item->receiver_id = DB::table('frontusers')->where('id', $item->receiver_id)->get();
            if (count($array) > 0) {
                foreach ($array as $key) {
                    if ($key->sender_id !== $item->receiver_id && $key->receiver_id !== $item->sender_id) {
                        $array[] = $item;
                    }
                }
            } else {
                $array[] = $item;
            }
        }
        return response()->json([
            'data' => $array,
        ], 200);
    }

    public function getConversation(Request $request, $receiver_id)
    {
        $receiver = Frontuser::find($receiver_id);
        $data = DB::table('messages')
            ->selectRaw('id, sender_id, receiver_id, text, images, created_at',)
            ->where('sender_id', $request->user()->id)
            ->where('receiver_id', $receiver_id)
            ->orWhere('sender_id', $receiver_id)
            ->where('receiver_id', $request->user()->id)
            // ->orderBy("created_at", "desc")
            ->get();
        return response()->json([
            'data' => $data,
            'receiver' => $receiver
        ], 200);
    }

    public function recieverMessage(Request $request, $receiver_id)
    {
        $receiver = Frontuser::find($receiver_id);
        $data = DB::table('messages')
            ->selectRaw('id, sender_id, receiver_id, text, images, created_at',)
            ->where('sender_id', $request->user()->id)
            ->where('receiver_id', $receiver_id)
            ->orWhere('sender_id', $receiver_id)
            ->where('receiver_id', $request->user()->id)
            // ->orderBy("created_at", "desc")
            ->get();
        return response()->json([
            'data' => $data,
            'receiver' => $receiver
        ], 200);
    }

    public function editText(Request $request,  $id)
    {
        try {
            $request->validate([
                'text' => 'required|string',
            ]);
            $message = chat::find($id);
            $message->text = $request->text;
            $message->save();
            return response()->json([
                'data' => $message,
            ], 200);
        } catch (\Exception) {
            return response()->json([
                'error' => 'Message not found',
            ], 404);
        }
    }

    public function removeAllConversations(Request $request, $receiver_id)
    {
        $user = $request->user();
        try {
            Chat::where('receiver_id', $receiver_id)
                ->where('sender_id', $request->user()->id)
                ->orWhere('receiver_id', $request->user()->id)
                ->where('sender_id', $receiver_id)
                ->delete();
            Chat::create(["sender_id" => $user->id, "receiver_id" => $receiver_id]);
            return response()->json([
                'status' => true,
                'data' => 'All conversations deleted successfully',
            ], 200);
        } catch (\Exception) {
            return response()->json([
                'status' => false,
                'error' => 'Message not found',
            ], 404);
        }
    }

    public function deleteTextMessage($id)
    {
        try {
            $message = chat::find($id);
            $message->delete();
            return response()->json([
                'data' => 'Message deleted successfully',
            ], 200);
        } catch (\Exception) {
            return response()->json([
                'error' => 'Message not found',
            ], 404);
        }
    }

    public function removeChatUser(Request $request, $user_id)
    {
        $user = $request->user();
        try {
            Chat::where('sender_id', $user->id)
                ->where('receiver_id', $user_id)
                ->delete();
            return response()->json([
                'data' => 'Chat history with user deleted successfully',
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'error' => 'Error deleting chat history',
            ], 404);
        }
    }
}
