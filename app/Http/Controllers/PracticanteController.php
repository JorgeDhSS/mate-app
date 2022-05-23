<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Actividad;
use App\pregunta;


class PracticanteController extends Controller{

    public function __construct(){
        $this->middleware('auth.practicante')->except('');
    }
    
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

        return view('practicante_views.cuadernillo');
    }

}