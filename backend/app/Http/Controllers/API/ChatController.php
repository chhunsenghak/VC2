<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Message;
use App\Models\Message as chat;

class ChatController extends Controller
{
    //

    public function index(Request $request)
    {
        return [];
    }

    public function sendMessage(Request $request)
    {
        event(new Message($request->input('send_id'), $request->input('recieve_id'), $request->input('text'), $request->input('images')));
    }

    public function uploadMutipleImages(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'send_id' => 'required|integer',
            'recieve_id' => 'required|integer',
            'text' => 'string',
        ]);
        $imagesPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('storage/message_images'), $imageName);
                $imagesPaths[] = $imageName;
            }
            $message = chat::create([
                "send_id" => $request->send_id,
                "recieve_id" => $request->recieve_id,
                "message" => $request->message,
                "images" => implode(',', $imagesPaths),
            ]);
            return response()->json([
                'success' => true,
                'data' => $imagesPaths,
            ], 200);
        }
        event(new Message($request->input('send_id'), $request->input('recieve_id'), $request->input('message'), $request->input('imagesPaths')));
        return response()->json([
            'success' => false,
            'message' => 'No images were uploaded.',
        ], 400);
    }
}
