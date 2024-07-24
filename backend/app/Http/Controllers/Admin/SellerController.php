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
use App\Models\Notification;

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
        $type = LimitDurationType::find($request->limit_duration_type_id);
        if (!$type) {
            return redirect()->route('admin.seller.index')->withErrors('Limit duration type not found.');
        }

        $data = LimitDuration::where('limit_duration_type_id', $request->limit_duration_type_id)->first();
        if (!$data) {
            return redirect()->route('admin.seller.index')->withErrors('Limit duration data not found.');
        }

        $dateString = $request->input('start_date');
        $date = Carbon::createFromFormat('Y-m-d', $dateString);

        switch (strtolower($type->name)) {
            case 'yearly':
                $newDate = $date->addYear();
                break;
            case 'quarterly':
                $newDate = $date->addMonths(3);
                break;
            case 'weekly':
                $newDate = $date->addWeek();
                break;
            default:
                $newDate = $date->addMonth();
                break;
        }

        $newDateString = $newDate->format('Y-m-d');
        $limitDuration = CheckUser::create([
            'frontuser_id' => $id,
            'start_date' => $request->start_date,
            'end_date' => $newDateString,
            'limit_durations_id' => $data->id,
        ]);

        $user = Frontuser::find($id);
        if ($user) {
            $user->update(['check_id' => $limitDuration->id]);

            // Create notification for user
            Notification::create([
                'receiver_id' => $user->id,
                'title' => 'អាប់ដេកលក់ផលិតផលឥតដែនកំណត់',
                'description' => 'ការកំណត់ក្នុងការលក់ផលិតផលរបស់អ្នកត្រូវបានអាប់ដេត អ្នកអាចលក់ផលិតផលរបស់អ្នកដោយគ្មានការកំណត់ចាប់ពីថ្ងៃ: ' . $request->start_date . ' រហូតដល់ថ្ងៃ: ' . $newDateString . '.',
                'type' => 'ជូនដំណឹង',
            ]);

            return redirect()->route('admin.seller.index')->withSuccess('Updated check for user.');
        }

        return redirect()->route('admin.seller.index')->withErrors('User not found.');
    }


    public function destroy($id)
    {
        $user = Frontuser::destroy($id);
        return redirect()->back()->withSuccess('User deleted !!!');
    }
}
