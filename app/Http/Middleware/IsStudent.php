<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class IsStudent
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
        // $id = $request->id;
        // $user = User::where('id', '=', $id)->first();
        if ( auth()->user()->roleId == 3 ) {
            if (null == $request->route('id')||$request->route('id') ==  auth()->user()->id)
            {
                return $next($request);
            }
        } 
        // else {
        //     return redirect()->route('welcome');
        // }
        // elseif (auth()->user()->roleId == 1) {

        //     return redirect()->route('api.admins.home', auth()->user()->id);

        // } 
        // elseif (auth()->user()->roleId == 3) {
            
        //     return redirect()->route('api.students.home', auth()->user()->id);
        // }
        return redirect()->route('home');
    }
}
