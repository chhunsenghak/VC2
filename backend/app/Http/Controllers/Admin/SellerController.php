<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontuser;

use Spatie\Permission\Models\Role;


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
        // $this->middleware('role_or_permission:Permission create', ['only' => ['create', 'store']]);
        // $this->middleware('role_or_permission:Permission edit', ['only' => ['edit', 'update']]);
        // $this->middleware('role_or_permission:Permission delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $users = Frontuser::where('shop', 1)->latest()->get();
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
}
