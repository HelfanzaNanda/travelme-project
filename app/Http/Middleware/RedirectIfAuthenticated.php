<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){

            case 'admin':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('admin.dashboard');
                }
                break;

            case 'owner':
                if (Auth::guard($guard)->check()){
                    $user = Auth::guard($guard)->user();
                    if ($user->active =='2'){
                        return redirect()->route('owner.dashboard');
                    }
                }
                break;

                // case 'driver':
                //     if (Auth::guard($guard)->check()){
                //         return 'drvier';
                //     }
                //     break;
    

            default:
                if (Auth::guard($guard)->check()){
                    return 'belom dibuat bro';
                }
                break;
        }
        return $next($request);
    }
}
