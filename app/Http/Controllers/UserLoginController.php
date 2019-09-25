<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserLoginController extends Controller
{
    public function login(Request $request) 
    {
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $user = User::where(['email' => $email], ['password' => $password])->get();
        if (empty($user)) {
            $request->session()->flash('error', 'These credentials do not match our records');
            return redirect('/login');
        }
        $request->session()->flash('success', 'You are logged in');
        return redirect('/');
    }
}
