<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CoordinatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()))
        {
            // Validate if user is a coordinator
            if(Auth::user()->user_type == 5)
            {
                return $next($request);
            }
            else
            {
                Auth::logout();
                return redirect(url(''));
            }
        }
        else
        {
            Auth::logout();
            return redirect(url(''));
        }
    }
}
