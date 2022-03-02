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
        $id = $request->id;
        $user = User::where('id', '=', $id)->first();

        if ($user->roleId == 1) { // 1 is for admin

            //admin : then redirect to the targeted url
            return $next($request); 
        } 
        else {
            //if not admin redirection
            return redirect()->route('login');
        }
    }
}
