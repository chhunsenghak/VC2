<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontUserResource;
use App\Models\Frontuser;
use Illuminate\Http\Request;

class FrontUserController extends Controller
{
    //
    public function index()
    {
        // Retrieve all users
        $users = Frontuser::all();

        // Return users as a JSON response
        return response()->json($users);
    }

    public function show($id)
    {
        $user = Frontuser::find($id);
        $user = new FrontUserResource($user);
        return response()->json($user);
    }

    public function edit(Request $request)
    {
        $user = $request->user();
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->shop = 1;
        $user->save();
        return response()->json(["success" => true, "user" => $user]);
    }

  
}
