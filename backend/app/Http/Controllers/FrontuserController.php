<?php

namespace App\Http\Controllers;

use App\Models\Frontuser;
use Illuminate\Http\Request;

class FrontuserController extends Controller
{
    //
    public function index()
    {
        $users = Frontuser::list();
        return view('bashboard', ['users' => $users]);
    }
    public function destroy(Request $id)
    {
        Frontuser::destroy($id);
        return redirect()->back()->withSuccess('Role deleted !!!');
    }
}
