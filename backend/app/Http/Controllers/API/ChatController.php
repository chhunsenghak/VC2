<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Message;

class ChatController extends Controller
{
    //

    public function index(Request $request)
    {
        return [];
    }

    public function sendMessage(Request $request)
    {
        event(new Message($request->input('send_id'), $request->input('recieve_id'), $request->input('message'), $request->input('image')));
    }
}
