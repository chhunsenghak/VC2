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
        $user = Frontuser::find($id);
        return view('seller.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = Frontuser::find($id);
        $user->update(["check" => $request->check]);
        return redirect()->route('admin.seller.index')->withSuccess('Updated Chcek for user ');
    }

    public function destroy($id)
    {
        $user = Frontuser::destroy($id);
        return redirect()->back()->withSuccess('User deleted !!!');
    }
}
