<?php

namespace App\Http\Controllers;

use App\Asesor;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendWelcomeEmail;
use App\Practicante;
use Illuminate\Support\Facades\Mail;
use Throwable;

class DirectorController extends Controller
{
    public function createAsesorView()
    {
        return view('director_views.createAsesor');
    }
    public function createUser(Request $request)
    {
        try
        {
            if(User::where('email', $request->email)->count() == 0)
            {
                $user           = new User();
                $user->name     = $request->name;
                $user->email    = $request->email;
                $password       = "Hi";
                $user->password = Hash::make($password);
                $user->save();

                $objDemo = new \stdClass();
                $objDemo->demo_one = 'Demo One Value';
                $objDemo->demo_two = 'Demo Two Value';
                $objDemo->sender = 'SenderUserName';
                $objDemo->receiver = 'ReceiverUserName';
    
                Mail::to($user->email)->send(new SendWelcomeEmail($objDemo));
                return (['status' => 'ok', 'hashedPassword' => $user->password, 'userId' => $user->id]);
            }
            else
            {
                return (['status' => 'mailRepeat']);
            }
        }catch(Exception $e)
        {
            return (['status' => 'fail', 'exception' => $e->__toString()]);
        }
    }
    public function saveAsesor(Request $request)
    {
        try{
            if(Asesor::where('cedProfesional', $request->cedProf)->count() == 0)
            {
                $asesor                 = new Asesor();
                $asesor->user_id        = $request->userId;
                $asesor->cedProfesional = $request->cedProf;
                $asesor->nivelEscolar   = $request->nivelEscolar;
                $asesor->noGrupos       = 0;
                $asesor->noAsesorados   =  0;
                $asesor->save();

                return view('director_views.createAsesor')->with(['alert' => "Swal({
                    title: 'Éxito!',
                    text: 'Ha agregado un asesor',
                    icon: 'success',
                    showCancelButton: 'false', 
                    showConfirmButton: 'false'
                });"]);
            }
            else
            {
                return view('director_views.createAsesor')->with(['alert' => "Swal({
                    title: 'Error!',
                    text: 'Cédula duplicada',
                    icon: 'error',
                    showCancelButton: 'false', 
                    showConfirmButton: 'false'
                });"]);
            }
        }catch (Throwable $e) {
            return view('director_views.createAsesor')->with(['alert' => "Swal({
                title: 'Error!',
                text: 'Ocurrió un error, vuelva a intentarlo',
                icon: 'error',
                showCancelButton: 'false', 
                showConfirmButton: 'false'
            });"]);
        }
    }

    public function createDeleteView(){
        return view('director_views.eliminarAsesor');
    }

    public function buscarAsesor(Request $request){
        $asesores = Asesor::join('users', 'users.id', '=', 'asesors.user_id')
            ->select('users.name', 'asesors.cedProfesional', 'users.email', 'users.id as user_id', 'asesors.id as asesor_id')
            ->where('users.name', 'like', '%'.$request->name.'%')
            ->get();
        
        $view = view('director_views.asesoresList', ["asesors" => $asesores])->render();
        return (["html" => $view]);
    }

    public function eliminarAsesor($id, $id2){
        $usuario = User::where('id', $id);
        $usuario->delete();   

        $asesor = Asesor::where('id', $id2);
        $asesor->delete();   
        //return back();
        return back()->withErrors(['asesor'=>'Asesor Eliminado correctamente'])->withInput([request('asesor')]);
    }

    public function enviarAsignacion(Request $request){
        $practicante = Practicante::find($request->idPracticante);
        $practicante->tutor_id = $request->idTutor;
        $practicante->save();
        
        return view('asesor_views.asignarTutor');
    }

    
}
