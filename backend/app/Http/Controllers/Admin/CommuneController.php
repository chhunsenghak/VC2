<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommuneResource;
use App\Http\Resources\DistrictResource;
use App\Models\Commune;
use Illuminate\Http\Request;
use App\Models\District;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commune = Commune::paginate(5);
        $districts = District::all();
        return view('address.commune.index', ["commune" => $commune, "districts" => $districts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        $districts = District::all();
        return view("address.commune.new", ["districts" => $districts]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'district_id' => 'required|integer',
        ]);
        Commune::create($validated);
        return redirect()->back()->withSuccess('Commune added');
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
    public function edit(Request $request, string $id)
    {
        $commune = Commune::find($id);
        $districts = District::all();
        return view('address.commune.edit', ["commune" => $commune, "districts" => $districts]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commune = Commune::find($id);
        $commune->update($request->all());
        return redirect()->back()->withSuccess('Updated commune');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commune = Commune::find($id);
        $commune->delete();
        return redirect()->back()->withSuccess('Deleted successfully');
    }
}
