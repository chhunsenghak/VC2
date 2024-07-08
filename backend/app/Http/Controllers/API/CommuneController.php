<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommuneResource;
use App\Http\Resources\DistrictResource;
use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commune = Commune::all();
        $commune = CommuneResource::collection($commune);
        return response(['sucess' => true, 'commune' =>$commune], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $commune = Commune::create($request);
        return response(['sucess' => true, 'data' => $commune], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $commune = Commune::find($id);
        return response(['sucess' => true, 'data' => $commune], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commune = Commune::find($id);
        $commune->update($request->all());
        return response(['sucess' => true, 'data' => $commune], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commune = Commune::find($id);
        $commune->delete();
        return response(['sucess' => true, 'message' => "Commune was deleted"], 200);
    }
}
