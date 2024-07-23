<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckUser;
use Illuminate\Http\Request;
use App\Models\Frontuser;
use Spatie\Permission\Models\Role;
use App\Models\LimitDuration;
use App\Models\LimitDurationType;
use Illuminate\Cache\RateLimiting\Limit;
use Carbon\Carbon;


class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:Permission access|Permission create | Permission edit | Permission delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Permission create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Permission edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Permission delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = Frontuser::where('shop', 1)->paginate(5);
        return view('seller.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::get();
        return view('seller.new', ['roles' => $roles]);
    }

    public function show(Request $id)
    {
        $user = Frontuser::findOrFail($id);
        return view('seller.detail', compact('user'));
    }

    public function edit($id)
    {
        $limitDurationType = LimitDurationType::all();
        $limitDuration = LimitDuration::all();
        $user = Frontuser::find($id);
        return view('seller.edit', ['user' => $user, 'limitDurationType' => $limitDurationType, 'limitDuration' => $limitDuration]);
    }

    public function update(Request $request, $id)
    {
        $type = LimitDurationType::where("id", $request->limit_duration_type_id)->first();
        $data = LimitDuration::where('limit_duration_type_id', $request->limit_duration_type_id)->get();
        $dateString = $request->input('start_date');
        $date = Carbon::createFromFormat('Y-m-d', $dateString);
        if ($type->name == "Yearly") {
            $newDate = $date->addYear();
        } else if ($type->name == "quarterly") {
            $newDate = $date->addMonth(3);
        } else if ($type->name == "Weekly") {
            $newDate = $date->addWeek();
        } else {
            $newDate = $date->addMonths(1);
        }
        $newDateString = $newDate->format('Y-m-d');
        $limitDuration = CheckUser::create([
            "frontuser_id" => $id,
            "start_date" => $request->start_date,
            "end_date" => $newDateString,
            "limit_durations_id" => $data[0]->id,
        ]);
        $user = Frontuser::find($id);
        $user->update(["check_id" => $limitDuration->id]);
        return redirect()->route('admin.seller.index')->withSuccess('Updated Chcek for user ');
    }

    public function destroy($id)
    {
        $user = Frontuser::destroy($id);
        return redirect()->back()->withSuccess('User deleted !!!');
    }
}
