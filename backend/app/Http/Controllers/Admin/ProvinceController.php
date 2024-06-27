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
        $province = Province::all();
        return response(['sucess' => true, 'data' =>$province], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $province = Province::create($request);
        return response(['sucess' => true, 'data' => $province], 200);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
