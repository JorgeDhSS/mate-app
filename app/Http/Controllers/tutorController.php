<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tutor;
use App\User;

class TutorController extends Controller{

    
    //Agrega un tutor a la BD
    public function enviarTutor(Request $request){
        $tutor = new Tutor();
        $tutor->curp = $request->curpT;
        $tutor->domicilio = $request->domicilioT;
        $tutor->numberPhone = $request->numeroT;
        $tutor->user_id = "1";
        $tutor->save();

        $userT = new User();
        $userT->name = $request->nombreT;
        $userT->email = $request->emailT;
        $userT->password = $request->passwordT;
        $userT->save();

        session()->flash("success", "Tutor agregado!!");
        return back()->withInput();
        //return redirect()->route('createRegistroView');
    }
}