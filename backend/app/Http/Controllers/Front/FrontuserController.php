<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontuser;
use Spatie\Permission\Models\Role;

class FrontuserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index', 'show']]);
    }

    public function index()
    {
        $users = Frontuser::latest()->get();
        return view('front.setting.user.index', ['users' => $users]);
    }
    public function create()
    {
        $roles = Role::get();
        return view('setting.user.new', ['roles' => $roles]);
    }
    public function show(Request $id)
    {
        $user = Frontuser::findOrFail($id);
        return view('front.setting.user.detail', compact('user'));
    }
}
