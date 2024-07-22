<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Frontuser;
use App\Models\Locations;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);
        $user = $request->user(); // Assuming the user is authenticated
        $location = Locations::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        $user->location_id = $location->id;
        return response()->json([
            'message' => 'Location data saved successfully',
            'data' => $location
        ], 201);
    }

    public function show($id)
    {
        $user = Frontuser::find($id);
        $location = Locations::where("id", $user->location_id);
        return response()->json([
            'message' => 'Location data retrieved successfully',
            'data' => $location
        ], 200);
    }
}
