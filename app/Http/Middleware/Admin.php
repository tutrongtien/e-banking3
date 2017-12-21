<?php

namespace App\Http\Middleware;

use Closure;
use User;   
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->is_admin)
        {
            throw new AccessDeniedHttpException;          
        } 
        return $next($request);
    }
}
