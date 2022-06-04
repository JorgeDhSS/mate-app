<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Actividad;
use App\Practicante;
use App\pregunta;
use App\respuesta;
use App\Respuesta_Pregunta;
use App\User;
use Illuminate\Support\Facades\Auth;
use Throwable;
use App\ActividadCuadernillo;


class PracticanteController extends Controller{

    public function __construct(){
        $this->middleware('auth.practicante')->except('');
    }
    
    public function showActivity($idActividad, $idCuadernillo){
        $actividad = Actividad::where('id', '=', $idActividad)
            ->first();

        $preguntaActiv = pregunta::where('idActividad', '=', $idActividad)
            ->get();
        
        return view('practicante_views.showActivity')->with([
            'actividad' => $actividad,
            'preguntaActiv' => $preguntaActiv,
            'idCuadernillo' => $idCuadernillo,
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

    public function sendAnswers(Request $request)
    {
        if(Practicante::where('user_id', Auth::id())->count() > 0)
        {
            try
            {
                foreach($request->respuesta as $idPregunta => $idRespuesta)
                {
                    $respuestaPregunta = new Respuesta_Pregunta();
                    $respuestaPregunta->actividad_id = $request->idActivity;
                    $respuestaPregunta->cuadernillo_id = $request->idCuadernillo;
                    $practicante = Practicante::where('user_id', Auth::id())->first();
                    $respuestaPregunta->practicante_id = $practicante->id;
                    $respuestaPregunta->pregunta_id = $idPregunta;

                    $respuesta = respuesta::find($idRespuesta);
                    if($respuesta != null)
                    {
                        if($respuesta->valor == 1)
                        {
                            $respuestaPregunta->correcta = true;
                        }
                        else
                        {
                            $respuestaPregunta->correcta = false;
                        }
                    }
                    else
                    {
                        $respuestaPregunta->correcta = true;
                    }
                    $respuestaPregunta->save();
                    
                }
                $actividad = Actividad::where('id', '=', $request->idActivity)->first();

                $preguntaActiv = pregunta::where('idActividad', '=', $request->idActivity)->get();
                
                $actividades = ActividadCuadernillo::where('cuadernillo_id','=',$request->idCuadernillo)
                    ->join('actividads','actividad_cuadernillos.actividad_id','=','actividads.id')
                    ->select('actividads.id','actividads.titulo', 'actividads.fechaInicio','actividads.fechaCierre')
                    ->get();
                
                return view('practicante_views.actividadesMostrar', compact('actividades'))
                ->with([
                    'alert' => "Swal({
                        title: '¡Éxito!',
                        text: 'Respuestas recibida',
                        icon: 'success',
                        showCancelButton: 'false', 
                        showConfirmButton: 'false'
                    });"
                ]);
            } catch (Throwable $e) 
            {
                $actividad = Actividad::where('id', '=', $request->idActivity)->first();

                $preguntaActiv = pregunta::where('idActividad', '=', $request->idActivity)->get();
                
                return view('practicante_views.showActivity')->with([
                    'actividad' => $actividad,
                    'preguntaActiv' => $preguntaActiv,
                    'idCuadernillo' => $request->idCuadernillo,
                    'alert' => "Swal({
                        title: 'Error!',
                        text: 'Ocurrió un error en el sistema, repórtelo',
                        icon: 'error',
                        showCancelButton: 'false', 
                        showConfirmButton: 'false'
                    });"
                ]);
            }
        }
        else{
            $actividad = Actividad::where('id', '=', $request->idActivity)
            ->first();

            $preguntaActiv = pregunta::where('idActividad', '=', $request->idActivity)
                ->get();
            
            return view('practicante_views.showActivity')->with([
                'actividad' => $actividad,
                'preguntaActiv' => $preguntaActiv,
                'idCuadernillo' => $request->idCuadernillo,
                'alert' => "Swal({
                    title: 'Error!',
                    text: 'Debe ser un practicante para responder las preguntas',
                    icon: 'error',
                    showCancelButton: 'false', 
                    showConfirmButton: 'false'
                });"
            ]);
        }
    }
    /*public function mostrarActividades(){
        
        /*$idUser = Auth::user()->id;
        $datos = User::select('name', 'email', 'password')
        ->where('id', '=', $idUser)
        ->first();*/

        /*return view('practicante_views.cuadernillo')->with([
            'datos' => $datos
        ]);

        return view('practicante_views.actividadesMostrar');
    }*/

    public function mostrarActividades($cuadernillo_id){
        $actividades = ActividadCuadernillo::where('cuadernillo_id','=',$cuadernillo_id)
            ->join('actividads','actividad_cuadernillos.actividad_id','=','actividads.id')
            ->select('actividads.id','actividads.titulo', 'actividads.fechaInicio','actividads.fechaCierre', 'actividad_cuadernillos.cuadernillo_id')
            ->get();
        

        return view('practicante_views.actividadesMostrar', compact('actividades'));
    }
}