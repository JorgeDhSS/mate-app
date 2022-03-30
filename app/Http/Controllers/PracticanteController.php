<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Practicante;
use App\User;

class PracticanteController extends Controller{

    
    //Agrega un practicante a la BD
    public function enviarPracticante(Request $request){
        $practicante = new Practicante();
        $practicante->matricula = $request->matricula;
        $practicante->nivelEscolar = $request->nivelEsc;
        $practicante->horasSemanales = $request->horasSem;
        $practicante->calificacion = $request->calificacion;
        $practicante->noMaterias = $request->numMaterias;
        $practicante->user_id = "1";
        $practicante->tutor_id = "1";
        $practicante->asesor_id = "1";
        $practicante->save();

        $userP = new User();
        $userP->name = $request->nombreP;
        $userP->email = $request->emailP;
        $userP->password = $request->passwordP;
        $userP->save();

        session()->flash("success", "Practicante agregado!!");
        return back()->withInput();
        //return redirect()->route('createRegistroView');
    }
}