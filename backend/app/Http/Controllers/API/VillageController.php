<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\VillageResource;
use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $village = Village::all();
        $village = VillageResource::collection($village);
        return response(['sucess' => true, 'village' =>$village], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $village = Village::create($request);
        return response(['sucess' => true, 'data' => $village], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $village = Village::find($id);
        return response(['sucess' => true, 'data' => $village], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $village = Village::find($id);
        $village->update($request->all());
        return response(['sucess' => true, 'data' => $village], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $village = Village::find($id);
        $village->delete();
        return response(['sucess' => true, 'message' => "Village was deleted"], 200);
    }
}


