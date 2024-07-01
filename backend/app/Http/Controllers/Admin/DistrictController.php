<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Resources\DistrictResource;
use App\Models\Province;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $district = District::paginate(5);
        $district = DistrictResource::collection($district);
        return view("address.district.index", ["district" => $district]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $provinces = Province::all();
        return view("address.district.new", ['provinces' => $provinces]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'province_id' => 'required|integer',
        ]);
        District::create($validated);
        return redirect()->back()->withSuccess('District added');
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
    public function edit(Request $request, string $id)
    {
        $district = District::find($id);
        $provinces = Province::all();
        return view('address.district.edit', ["district" => $district, "provinces" => $provinces]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $district = District::find($id);
        $district->update($request->all());
        return redirect()->back()->withSuccess('District updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $district = District::find($id);
        $district->delete();
        return redirect()->back()->withMessage('Delete successfully');
    }
}
