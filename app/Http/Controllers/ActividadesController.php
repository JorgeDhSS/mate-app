<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\Grupo;

class ActividadesController extends Controller{

    //Muestra la vista addActividad
    public function create()
    {
        return view('asesor_views.addActividades');
    }

    //Muestra los grupos en la vista addActividad 
    public function showGrupo($id){
    
        $grupos = collect();
        foreach(Grupo::where('id', $id)->get() as $Grupo){
            $grupos = $grupos->concat(Actividad::where('idgrupo', $id)->get());
        }
        return $grupos;
        //return response(json_encode($disenos),200)->header('Content-type','text/plain');
    }

    //Agrega la actividad nueva a la base de datos
    public function guardarActividad(Request $request){

        
        $actividad = new Actividad();
        
        $actividad->descripcion = $request->descripcionActividad;
        $actividad->titulo = $request->nombreActividad;
        $actividad->fechaInicio = $request->fechaInicio;
        $actividad->fechaCierre = $request->fechaTermina;
        $actividad->valor = $request->valorActividad;
        $actividad->idgrupo = $request->selecionaGrupo;
        $actividad->asesor_id= 1;
        $actividad->save();
        return view('asesor_views.addActividades');
        
        
        

    }
}