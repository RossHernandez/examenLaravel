<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && $request->user()->tipo_usuario==0 ){
            return redirect()->guest('/');
        }
        return $next($request);    
    }
}
