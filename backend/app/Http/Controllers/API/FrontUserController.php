<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontUserResource;
use App\Models\Frontuser;
use Illuminate\Http\Request;
use App\Models\Locations;

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
        // if ($request->
        // return $request;
        $user = $request->user();
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $location = Locations::create([
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);
        $user->location_id = $location->id;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->shop = 1;
        $user->save();
        return response()->json(["success" => true, "user" => $user]);
    }
}
