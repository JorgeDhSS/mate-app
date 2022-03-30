<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;

class ActividadesController extends Controller{

    //Muestra la vista addActividad
    public function create()
    {
        return view('asesor_views.addActividades');
    }

    //Agrega la actividad nueva a la base de datos
    public function guardarActividad(Request $request){
        $actividad = new Actividad();
        $actividad->descripcion = $request->descripcionActividad;
        $actividad->titulo = $request->nombreActividad;
        $table->fechaInicio = $request->fechaInicio;
        $table->fechaCierre = $request->fechaTermina;

    }
}