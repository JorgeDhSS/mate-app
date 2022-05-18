<?php

namespace App\Http\Controllers;

use App\Practicante;
use App\Respuesta_Pregunta;
use App\Tutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller{

    public function getPuntuajes()
    {
        $Tutor = Tutor::where('user_id', Auth::user()->id)->first();
        $respuestas = Practicante::where('tutor_id', '=', $Tutor->id)
                        ->leftJoin('respuesta__preguntas', 'respuesta__preguntas.practicante_id', '=', 'practicantes.id')
                        ->has('respuesta_pregunta')
                        ->select("practicantes.*", DB::raw('SUM(respuesta__preguntas.correcta) as correctas'), DB::raw('count(respuesta__preguntas.correcta) as total'))
                        ->groupBy('practicantes.id')
                        ->get();
        return view('tutor_views.generarReporte', ["respuestas" => $respuestas]);
    }
}