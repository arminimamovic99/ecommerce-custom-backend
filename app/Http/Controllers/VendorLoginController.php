<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Vendor;

class VendorLoginController extends Controller
{
    public function create() 
    {
        return view('auth/vendor_login');
    }

    public function login(Request $request) 
    {
        $session_id = session()->getId();
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $vendor = Vendor::where(['email' => $email], ['password' => $password])->first();
        Vendor::where(['email' => $email], ['password' => $password])->update(array('session_id' => $session_id));
        if (empty($vendor)) {
            $request->session()->flash('error', 'These credentials do not match our records');
            return redirect('/vendor/login');
        }

        
        $request->session()->flash('success', 'You are logged in');
        return view('vendor/vendor_home');
    }

    public function logout()
    {
        session()->forget('vendor_id');
        session()->flush();

        return redirect('/');
    }
}