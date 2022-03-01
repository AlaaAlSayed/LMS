<?php

namespace App\Http\Middleware;

use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */



    public function handle(Request $request, Closure $next)
    {
        $user_name = $request->username;
        $role = User::where('username', '=', $user_name)->first();

        //        gettype($u)
        // @dd( $role->roleId);

        if ($role->roleId == 1) {
            return $next($request);
        } 
        else {
            return redirect()->route('welcome');
        }
    }
}
