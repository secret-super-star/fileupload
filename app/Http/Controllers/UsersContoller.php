<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersContoller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function delete($id)
    {
      // dump($id);
        $user = User::find($id);

        $user->delete();

        \Session::put('success', 'Update success');
        $users = User::all();
        return view('user', compact('users'));
    }


}
