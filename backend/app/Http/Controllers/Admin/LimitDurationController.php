<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LimitDuration;
use App\Http\Resources\LimitDurationResource;

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
        return view('limitDuration.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'duration' => ['required', 'integer', 'between:1,12'],
            'price' => ['required', 'numeric'],
        ]);

        LimitDuration::create($request->all());
        return redirect()->route('limitDuration.index')->withSuccess('Created limit duration');
    }
    public function edit($id)
    {
        $limitDuration = LimitDuration::find($id);
        return view('limitDuration.edit', ["limitDuration" => $limitDuration]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'duration' => ['required', 'integer', 'between:1,12'],
            'price' => ['required', 'numeric'],
        ]);

        $limitDuration = LimitDuration::find($id);
        $limitDuration->update($request->all());
        return redirect()->route('limitDuration.index')->withSuccess('Updated limit duration');
    }

    public function destroy($id)
    {
        LimitDuration::destroy($id);
        return redirect()->route('limitDuration.index')->withSuccess('Deleted limit duration');
    }
}
