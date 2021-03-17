<?php

namespace App\Http\Middleware;

use Closure;

class IsUser
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && $request->user()->tipo_usuario==1 ){
            return redirect()->guest('/home');
        }
        return $next($request);    
    }
}
