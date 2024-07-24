<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LimitDuration;
use App\Http\Resources\LimitDurationResource;
use App\Models\LimitDurationType;

class LimitDurationController extends Controller
{
    //
    public function index()
    {
        $limitDurations = LimitDuration::paginate(5);
        return view('limitDuration.index', ["limitDurations" => $limitDurations]);
    }

    public function create()
    {
        $durationType = LimitDurationType::all();
        return view('limitDuration.new', ["durationType" => $durationType]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'durations' => ['required', 'integer', 'between:1,12'],
            'price' => ['required', 'numeric'],
            'limit_duration_type_id' => ['required', 'integer'],
        ]);
        LimitDuration::create([
            'price' => $request->input('price'),
            'limit_duration_type_id' => $request->input('limit_duration_type_id'),
            'durations' => 1,
        ]);
        return redirect()->route('admin.limitDuration.index')->withSuccess('Created limit duration');
    }
    public function edit($id)
    {
        $limitDuration = LimitDuration::find($id);
        $durationType = LimitDurationType::all();
        return view('limitDuration.edit', ["limitDuration" => $limitDuration, "durationType" => $durationType]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'durations' => ['required', 'integer', 'between:1,12'],
            'price' => ['required', 'numeric'],
            'limit_duration_type_id' => ['required', 'integer']
        ]);

        $limitDuration = LimitDuration::find($id);
        $limitDuration->update($request->all());
        return redirect()->route('admin.limitDuration.index')->withSuccess('Updated limit duration');
    }

    public function destroy($id)
    {
        LimitDuration::destroy($id);
        return redirect()->route('admin.limitDuration.index')->withSuccess('Deleted limit duration');
    }
}
