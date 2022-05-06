<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Actividad;
use App\pregunta;
use Illuminate\Support\Facades\Auth;
use App\User;


class PracticanteController extends Controller{
    
    public function showActivity($idActividad){
        $actividad = Actividad::select('descripcion', 'titulo', 'fechaInicio', 'fechaCierre')
            ->where('id', '=', $idActividad)
            ->first();

        $preguntaActiv = pregunta::select('pregunta')
            ->where('idActividad', '=', $idActividad)
            ->get();
        
        return view('practicante_views.showActivity')->with([
            'actividad' => $actividad,
            'preguntaActiv' => $preguntaActiv
        ]);
    }

    public function mostrarCuadernos(){
        
        /*$idUser = Auth::user()->id;
        $datos = User::select('name', 'email', 'password')
        ->where('id', '=', $idUser)
        ->first();*/

        /*return view('practicante_views.cuadernillo')->with([
            'datos' => $datos
        ]);*/

        return view('practicante_views.cuadernillo');
    }

    

}