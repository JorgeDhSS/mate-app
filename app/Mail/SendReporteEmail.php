<?php

namespace App\Mail;

use App\Practicante;
use App\Tutor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SendReporteEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
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