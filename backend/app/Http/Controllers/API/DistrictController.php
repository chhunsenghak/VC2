<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Resources\DistrictResource;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $district = District::all();
        $district = DistrictResource::collection($district);
        return response(['sucess' => true, 'data' => $district], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $district = District::create($request);
        return response(['sucess' => true, 'data' => $district], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $disctrict = District::find($id);
        return response(['sucess' => true, 'data' => $disctrict], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $district = District::find($id);
        $district->update($request->all());
        return response(['sucess' => true, 'data' => $district], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $district = District::find($id);
        $district->delete();
        return response(['sucess' => true, 'message' => "District was deleted"], 200);
    }
}
