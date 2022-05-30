<?php

namespace App\Http\Middleware;

use Closure;
use App\Asesor;
use Illuminate\Support\Facades\Auth;

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
        if (auth()->check()) {
            $consulta = Asesor::select('id')->where('user_id', '=', auth()->user()->id)->first();
            if ($consulta){
                return $next($request);
            }
        }
        //return redirect('/sesion');
        Auth::logout();
        return redirect()->route('sesion.index')->with(['alert-asesor' => 'hola']);
    }
}
