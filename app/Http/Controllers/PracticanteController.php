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

class PracticanteController extends Controller{
    
    public function showActivity($idActividad, $idCuadernillo){
        $actividad = Actividad::where('id', '=', $idActividad)
            ->first();

        $preguntaActiv = pregunta::where('idActividad', '=', $idActividad)
            ->get();
        
        return view('practicante_views.showActivity')->with([
            'actividad' => $actividad,
            'preguntaActiv' => $preguntaActiv,
            'idCuadernillo' => $idCuadernillo
        ]);
    }

    public function mostrarCuadernos(){

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
                $actividad = Actividad::where('id', '=', $request->idActivity)->first();

                $preguntaActiv = pregunta::where('idActividad', '=', $request->idActivity)->get();
                
                return view('practicante_views.showActivity')->with([
                    'actividad' => $actividad,
                    'preguntaActiv' => $preguntaActiv,
                    'idCuadernillo' => $request->idCuadernillo,
                    'alert' => "Swal({
                        title: '¡Éxito!',
                        text: 'Respuestas recibida',
                        icon: 'success',
                        showCancelButton: 'false', 
                        showConfirmButton: 'false'
                    });"
                ]);
            }
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
}