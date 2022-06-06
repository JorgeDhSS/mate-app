<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use App\Grupo;
Use App\pregunta;
Use App\respuesta;

class ActividadesController extends Controller{

    public function __construct(){
        $this->middleware('auth.asesor')->except('');
    }

    //Muestra la vista addActividad
    public function create()
    {
        return view('asesor_views.addActividades');
    }

    public function addAnswerView() {
        return view('asesor_views.addAnswer');
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
        return redirect('asesor_views.respuestas');
        //return view('asesor_views.addActividades');
    }
     

    public function createRespuestas()
    {
        return view('asesor_views.respuestas');
    }
    public function guardarPregunta(Request $request){

        date_default_timezone_set("America/Mexico_City");
        $json = json_decode($request->jsonPreguntas, true);
        
            $actividad = new Actividad();
              
            $actividad->descripcion = $request->descripcionActividad;
            $actividad->titulo = $request->nombreActividad;
            $actividad->fechaInicio = $request->fechaInicio;
            $actividad->fechaCierre = $request->fechaTermina;
            $actividad->valor = $request->valorActividad;
            $actividad->idgrupo = $request->selecionaGrupo;
            $actividad->asesor_id= 1;
            $actividad->save();
            if($json != null){
                foreach($json as $preguntas){
                    $pregunta = new pregunta();
                    $pregunta->idActividad = $actividad->id;
                    $pregunta->pregunta = $preguntas['pregunta'];
                    $pregunta->save();

                }
            }
            
            
            return view('asesor_views.addActividades');

    }


    public function mostrarActividades($id){
        $actividades = collect();
        foreach(Grupo::where('id', $id)->get() as $grupo){

            $actividades = $actividades->concat(Actividad::where('idgrupo', $id)->get());
        }
        return $actividades;

    }
    //Mostrar preguntas
    public function mostrarPreguntas($id){

        $preguntas = collect();
        foreach(Actividad::where('id', $id)->get() as $actividad){

            $preguntas = $preguntas->concat(pregunta::where('idActividad', $id)->get());
        }
        return $preguntas;

    }
    public function guardarRespuesta(Request $request){
        date_default_timezone_set("America/Mexico_City");
        $json = json_decode($request->jsonRespuestas, true);

        foreach($json as $respuestas){
            $respuesta = new respuesta();
            $respuesta->idpregunta = $request->SeleccionaPregunta;
            $respuesta->respuesta = $respuestas['respuesta'];
            $respuesta->valor = $respuestas['valorRes'];
            $respuesta->save();

        }
        return view('asesor_views.respuestas');

    }

 

 

    
}