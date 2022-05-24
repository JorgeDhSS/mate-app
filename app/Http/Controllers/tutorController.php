<?php

namespace App\Http\Controllers;

use App\Practicante;
use App\Tutor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Barryvdh\DomPDF\Facade as PDF;
//use PDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Storage;

class TutorController extends Controller{

    public function __construct(){
        $this->middleware('auth.tutor')->except('');
    }
    public function imprimir(){
        

        if(Auth::user() != null){
            $Tutor = Tutor::where('user_id', Auth::user()->id)->first();
            $respuestas = Practicante::where('tutor_id', '=', $Tutor->id)
                            ->leftJoin('respuesta__preguntas', 'respuesta__preguntas.practicante_id', '=', 'practicantes.id')
                            ->has('respuesta_pregunta')
                            ->select("practicantes.*", DB::raw('SUM(respuesta__preguntas.correcta) as correctas'), DB::raw('count(respuesta__preguntas.correcta) as total'))
                            ->groupBy('practicantes.id')
                            ->get();
            $details =['title' => 'test', "respuestas" => $respuestas];
            $pdf = PDF::loadView('tutor_views.generarReporte', $details)->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('invoice.pdf');
        }else{
            return view('tutor_views.generarReporte')->with(['alert' => "Swal({
                title: 'No has iniciado sesión!',
                text: 'Inicia sesion para continuar',
                icon: 'error',
                showCancelButton: 'false', 
                showConfirmButton: 'false'
            });"]);
        }
   }


    // $pdf = PDF::loadView('reports.today', ['Data' => $Data])->setOptions(['defaultFont' => 'sans-serif']);

    // return $pdf->download('invoice.pdf');

    public function generarReporteView(){
        return view('tutor_views.generarReporte');
    }

    public function getPuntuajes()
    {
        //return json_encode(Auth::user());
        if(Auth::user() != null){
            $Tutor = Tutor::where('user_id', Auth::user()->id)->first();
            $respuestas = Practicante::where('tutor_id', '=', $Tutor->id)
                            ->leftJoin('respuesta__preguntas', 'respuesta__preguntas.practicante_id', '=', 'practicantes.id')
                            ->has('respuesta_pregunta')
                            ->select("practicantes.*", DB::raw('SUM(respuesta__preguntas.correcta) as correctas'), DB::raw('count(respuesta__preguntas.correcta) as total'))
                            ->groupBy('practicantes.id')
                            ->get();
            return view('tutor_views.generarReporte', ["respuestas" => $respuestas]);
        }else{
            return view('tutor_views.generarReporte')->with(['alert' => "Swal({
                title: 'No has iniciado sesión!',
                text: 'Inicia sesion para continuar',
                icon: 'error',
                showCancelButton: 'false', 
                showConfirmButton: 'false'
            });"]);
        }
    }
}