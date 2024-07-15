<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\VillageResource;
use App\Models\Commune;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villages = Village::paginate(5); // Change variable name for clarity
        return view('address.village.index', ['villages' => $villages]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $communes = Commune::all();
        return view("address.village.new", ["communes" => $communes]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'commune_id' => 'required|integer',
        ]);
        Village::create($validated);
        return redirect()->back()->withSuccess('Village added');
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
    public function edit(Request $request, string $id)
    {
        $village = Village::find($id);
        $communes = Commune::all();
        return view("address.village.edit", ["village" => $village, "communes" => $communes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $village = Village::find($id);
        $village->update($request->all());
    return redirect()->back()->withSuccess('Updated village');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Village::destroy($id);
        return redirect()->back()->withSuccess('Village deleted');
    }
}
