<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    use RedirectsUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo() 
    {
        // User role
        $role = Auth::user()->role;

        if ($role === "vendor") {
            return redirect('/vendor/home');
        }
        else if ($role === "admin") {
            return redirect('/panel');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showForm() 
    {
        return view('auth/login');
    }
}
