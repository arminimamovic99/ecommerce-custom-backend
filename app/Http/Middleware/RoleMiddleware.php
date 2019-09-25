<?php
namespace App\Http\Middleware;

use App\User;

class RoleMiddleware {
    /*public function __construct()
        {
            var_dump(1);exit;
            $user = $auth()->user();
            if ($user->role === 'User') {
                    return redirect('/');
            } 
        }*/

        public function handle($request, Closure $next)
        {
            if ($request->user() && $request->user()->role != 'admin') {
                return new Response(view('unauthorized')->with('role', 'admin'));
            }
            return $next($request);
        }
}

        