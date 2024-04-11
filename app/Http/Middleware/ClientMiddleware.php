<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth()->user()->hasRole('client')){            
            return $next($request);
        }else{
            abort(401, 'Unauthorized');
        }
    }
}
