<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Actividad;
use App\pregunta;


class PracticanteController extends Controller{
    
    public function showActivity($idActividad){
        $actividad = Actividad::select('descripcion', 'titulo', 'fechaInicio', 'fechaCierre')
            ->where('id', '=', $idActividad)
            ->get();

        $preguntaActiv = pregunta::where('idActividad', '=', $idActividad)
            ->select('pregunta')
            ->get();
        
        return view('practicante_views.showActivity', $idActividad)->with([
            'actividad' => $actividad,
            'preguntaActiv' => $preguntaActiv
        ]);
    }

    public function mostrarCuadernos(){

        return view('practicante_views.cuadernillo');
    }

}