<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Message;
use App\Models\Message as chat;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ListChatUserResource;
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

    public function uploadMultipleImages(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
        ]);
        $imagesPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage/message_images'), $imageName);
                $imagesPaths[] = $imageName;
            }
            $message = chat::create([
                "sender_id" => $request->input('sender_id'),
                "receiver_id" => $request->input('receiver_id'),
                "images" => implode(',', $imagesPaths),
            ]);
            event(new Message($request->input('sender_id'), $request->input('receiver_id'), $request->input('text'), $request->input('imagesPaths')));
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
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
        ]);
        try {
            $message = chat::create([
                "sender_id" => $request->input('sender_id'),
                "receiver_id" => $request->input('receiver_id'),
                "text" => $request->input('text'),
            ]);
            event(new Message($request->input('sender_id'), $request->input('receiver_id'), $request->input('text'), $request->input('imagesPaths')));
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
    public function getUser($id)
    {
        $data = DB::table('messages')
            ->selectRaw('distinct sender_id, receiver_id, text, images, created_at')
            ->where('sender_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();
        $data = ListChatUserResource::collection($data);
        $array = [];
        foreach ($data as $item) {
            $array[$item->receiver_id] = $item;
            $item->receiver_id = DB::table('frontusers')->where('id', $item->receiver_id)->get();
        }
        // foreach ($data as $item){
        // }    
        return $array;
    }
}
