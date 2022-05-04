<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;
use App\Practicante;

class registroTPController extends Controller
{
    public function createRegistroView()
    {
        return view('asesor_views.registro');
    }


    //Agrega un usuario a la BD
    public function enviarUsuario(Request $request){
        $countE = User::where('email',$request->email)->count();
        $countC = Tutor::where('curp',$request->curp)->count();

        if ($countE == 0 && $countC == 0) {
            $user = new User();
            $user->name = $request->nombre;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            if ($request->buttonT == "true") {
                $tutor = new Tutor();
                $tutor->curp = $request->curpT;
                $tutor->domicilio = $request->domicilioT;
                $tutor->numberPhone = $request->numeroT;
                $tutor->user_id = $user->id;
                $tutor->save();

                return back();
            }else{
                $practicante = new Practicante();
                $practicante->matricula = $request->matricula;
                $practicante->nivelEscolar = $request->nivelEsc;
                $practicante->horasSemanales = $request->horasSem;
                $practicante->calificacion = $request->calificacion;
                $practicante->noMaterias = $request->numMaterias;
                $practicante->user_id = $user->id;
                $practicante->tutor_id = "0";
                $practicante->asesor_id = "0";
                $practicante->save();

                return back();
            }
        }else{
            return back()->withErrors(['email'=>'Email ya registrado anteriormente'])->withInput([request('email')]);
        }

    }





}
