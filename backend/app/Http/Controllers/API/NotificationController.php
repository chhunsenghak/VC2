<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $data = Notification::all();
        return response([
            'data' => $data,
            'success' => true
        ]);
    }
    public function show(Request $request)
    {
        $data = Notification::where("receiver_id", $request->user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
        return response([
            'data' => $data,
            'success' => true
        ]);
    }
}
