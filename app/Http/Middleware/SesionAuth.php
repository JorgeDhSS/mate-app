<?php

namespace App\Http\Middleware;

use Closure;

class SesionAuth
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
        if (auth()->check()){
            return $next($request);
        }
        //return redirect('/sesion');
        return redirect()->route('sesion.index')->with(['alert-sesion' => 'hola']);
    }
}
