<?php

namespace App\Http\Middleware;

use Closure;
use App\Asesor;

class AsesorAuth
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
        $consulta = Asesor::select('id')->where('user_id', '=', auth()->user()->id)->first();
        if (auth()->check()) {
            if ($consulta){
                return $next($request);
            }
        }
        return redirect('/sesion');
    }
}
