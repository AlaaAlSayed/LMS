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

        if (auth()->user()->roleId == 1) { // 1 is for admin

            //admin : then redirect to the targeted url
            return $next($request); 
        } 
       
        //  elseif (auth()->user()->roleId == 2) {

        //     return redirect()->route('api.teachers.home', auth()->user()->id);

        // } 
        // elseif (auth()->user()->roleId == 3) {
            
        //     return redirect()->route('api.students.home', auth()->user()->id);
        // }

        // //if not admin redirection
        return redirect()->route('home');
    }
}
