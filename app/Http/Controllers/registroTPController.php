<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;
use App\Practicante;
use Illuminate\Support\Facades\Hash;
use Throwable;

class registroTPController extends Controller
{

    public function __construct(){
        $this->middleware('auth.asesor')->except('');
    }

    public function createRegistroView()
    {
        return view('asesor_views.registro');
    }


    //Agrega un usuario a la BD
    public function enviarUsuario(Request $request){
        try{
            $countE = User::where('email',$request->email)->count();
            $countC = Tutor::where('curp',$request->curp)->count();
            $countP = Practicante::where('matricula',$request->matricula)->count();

            if($countE >= 1){
                return view('asesor_views.registro')->with(['alert' => "Swal({
                    title: 'Error!',
                    text: 'El email que ingreso, ya ha sido ingresado anteriormente',
                    icon: 'error',
                    showCancelButton: 'false', 
                    showConfirmButton: 'false'
                });"]);
            }elseif($countC >= 1){
                return view('asesor_views.registro')->with(['alert' => "Swal({
                    title: 'Error!',
                    text: 'El CURP que ingreso, ya ha sido ingresado anteriormente',
                    icon: 'error',
                    showCancelButton: 'false', 
                    showConfirmButton: 'false'
                });"]);
            }else{
                if ($request->buttonT == "true") {
                    $user = new User();
                    $user->name = $request->nombre;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->save();

                    $tutor = new Tutor();
                    $tutor->curp = $request->curpT;
                    $tutor->domicilio = $request->domicilioT;
                    $tutor->numberPhone = $request->numeroT;
                    $tutor->user_id = $user->id;
                    $tutor->save();

                    return view('asesor_views.registro')->with(['alert' => "Swal({
                        title: 'Éxito!',
                        text: 'Ha agregado un Tutor',
                        icon: 'success',
                        showCancelButton: 'false', 
                        showConfirmButton: 'false'
                    });"]);
                }
            }

            if($countE >= 1){
                return view('asesor_views.registro')->with(['alert' => "Swal({
                    title: 'Error!',
                    text: 'El email que ingreso, ya ha sido ingresado anteriormente',
                    icon: 'error',
                    showCancelButton: 'false', 
                    showConfirmButton: 'false'
                });"]);
            }elseif ($countP >= 1) {
                return view('asesor_views.registro')->with(['alert' => "Swal({
                    title: 'Error!',
                    text: 'La Matricula que ingreso ha sido ingresada anteriormente',
                    icon: 'error',
                    showCancelButton: 'false', 
                    showConfirmButton: 'false'
                });"]);
            }else{
                if ($request->buttonT != "true"){
                    $user = new User();
                    $user->name = $request->nombre;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->save();
    
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
    
                    return view('asesor_views.asignarTutor')->with(['alert' => "Swal({
                        title: 'Éxito!',
                        text: 'Ha agregado un Practicante',
                        icon: 'success',
                        showCancelButton: 'false', 
                        showConfirmButton: 'false'
                    });"]);
                }
            }
        } catch (Throwable $e) {
            return $e;
            return view('asesor_views.registro')->with(['alert' => "Swal({
                title: 'Error!',
                text: 'Algo salio mal, intente de nuevo',
                icon: 'error',
                showCancelButton: 'false', 
                showConfirmButton: 'false'
            });"]);
        }
    }





}
