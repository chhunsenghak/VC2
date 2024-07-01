<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::with('province', 'district', 'commune', 'village')->get();
        $addressesResource = AddressResource::collection($addresses);
        return response()->json(['success' => true, 'data' => $addressesResource], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $address = Address::create($request->all());
        return response(['success' => true, 'data' => $address], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address = Address::find($id);
        return response(['success' => true, 'data' => $address], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $address = Address::find($id);
        $address->update($request->all());
        return response(['success' => true, 'data' => $address], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::find($id);
        $address->delete();
        return response(['success' => true, 'message' => 'Address deleted successfully'], 200);
    }
}
