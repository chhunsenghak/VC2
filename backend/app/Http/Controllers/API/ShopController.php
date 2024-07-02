<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Shops;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shop = Shops::all();
        return response(['success' => true, 'data' => $shop], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shop = Shops::create($request->all());
        return response(['success' => true, 'data' => $shop], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $shop = Shops::find($id);
        return response(['success' => true, 'data' => $shop], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shop = Shops::find($id);
        $shop->update($request->all());
        return response(['success' => true, 'data' => $shop], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shop = Shops::find($id);
        $shop->delete();
        return response(['success' => true,'message' => "Shop was deleted"], 200);
    }
}
