<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $province = Province::paginate(5);
        return view("address.province.index", ["province" => $province]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        return view("address.province.new");
    }

    public function store(Request $request)
    {

        $province = new Province();
        $province->name = $request->name;
        $province->save();
        return redirect()->back()->withSuccess('Province added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $province = Province::find($id);
        return response(['sucess' => true, 'data' => $province], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(string $id)
    {
        $province = Province::find($id);
        return view("address.province.edit", ["province" => $province]);
    }
    public function update(Request $request, string $id)
    {
        $province = Province::find($id);
        $province->update($request->all());
        return redirect()->back()->withSuccess('Updated province');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Province::destroy($id);
        return redirect()->back()->withSuccess('Province Delete !!!');
    }
}
