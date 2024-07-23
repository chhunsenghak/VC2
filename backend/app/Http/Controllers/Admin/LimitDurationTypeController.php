<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LimitDurationType;

class LimitDurationTypeController extends Controller
{
    //
    public function index()
    {
        // Retrieve all Limit Duration Type
        $durationType = LimitDurationType::paginate(5);
        return view("limitDurationType.index", ["durationType" => $durationType]);
    }

    public function create()
    {
        // Show the form to create a new Limit Duration Type
        return view("limitDurationType.new");
    }
    public function store(Request $request)
    {
        // Store a new Limit Duration Type
        $durationType = LimitDurationType::create($request->all());
        return redirect()->back()->withSuccess('Create Duration Type!!!');
    }

    public function show($id)
    {
        // Retrieve a specific Limit Duration Type
        $durationType = LimitDurationType::find($id);
    }
    public function edit($id)
    {
        // Show the form to edit a specific Limit Duration Type
        $durationType = LimitDurationType::find($id);
        return view("limitDurationType.edit", ["durationType" => $durationType]);
    }
    public function update(Request $request, $id)
    {
        // Update a specific Limit Duration Type
        $durationType = LimitDurationType::find($id);
        $durationType->update($request->all());
        return redirect()->back()->withSuccess('Update Duration Type !!!');
    }
    public function destroy($id)
    {
        // Delete a specific Limit Duration Type
        $durationType = LimitDurationType::find($id);
        $durationType->delete();
        return redirect()->back()->withSuccess('Delete Duration Type !!!');
    }
}
