<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use  App\Models\Role;
class CheckRole
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
        $allowedRoles = array_slice(func_get_args(), 2); // [Admin, Teacher,Student]

        foreach ($allowedRoles as $role) {
    
            try {
    
                $UserRole=Role::whereName($role)->firstOrFail(); // make sure we got a "real" role
                // dd(  $UserRole->id);
                if (auth()->user()->roleId ==  $UserRole->id) {
                    return $next($request);
                }
    
            } catch (ModelNotFoundException $exception) {
    
                dd('Could not find role ' . $role);
    
            }
        }
    
        // Flash::warning('Access Denied', 'You are not authorized to view that content.'); // custom flash class
        dd('not auth' . $role);
    
        return redirect('/');
    
    
    }


    
      
      
      
}
