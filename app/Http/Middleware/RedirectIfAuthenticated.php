<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                //  return redirect(RouteServiceProvider::HOME);
                $user = Auth::user();


                if ($user->type == 1 || $user->type == 2) {
                    return redirect()->route('admin.dashboard');
                }

                if ($user->type == 3) {
                    return redirect()->route('user.profile');
                }

                return redirect( '/' );
            }
        }

        return $next($request);
    }
}
