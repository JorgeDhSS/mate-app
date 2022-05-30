<?php

namespace App\Http\Middleware;

use Closure;
use App\Tutor;
use Illuminate\Support\Facades\Auth;

class TutorAuth
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
            $consulta = Tutor::select('id')->where('user_id', '=', auth()->user()->id)->first();
            if ($consulta){
                return $next($request);
            }
        }
        //return redirect('/sesion');
        Auth::logout();
        return redirect()->route('sesion.index')->with(['alert-tutor' => 'hola']);
    }
}
