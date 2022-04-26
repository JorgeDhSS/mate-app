<?php

namespace App\Http\Controllers;

use App\Asesor;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendWelcomeEmail;
use Illuminate\Support\Facades\Mail;

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
            $user           = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $password       = Str::random(8);
            $user->password = Hash::make($password);
            $user->save();

            /*$objDemo = new \stdClass();
            $objDemo->demo_one = 'Demo One Value';
            $objDemo->demo_two = 'Demo Two Value';
            $objDemo->sender = 'SenderUserName';
            $objDemo->receiver = 'ReceiverUserName';
 
            Mail::to($user->email)->send(new SendWelcomeEmail($objDemo));*/
            return (['status' => 'ok', 'hashedPassword' => $user->password, 'userId' => $user->id]);
        }catch(Exception $e)
        {
            return (['status' => 'fail', 'exception' => $e->__toString()]);
        }
    }
    public function saveAsesor(Request $request)
    {
        $asesor                 = new Asesor();
        $asesor->user_id        = $request->userId;
        $asesor->cedProfesional = $request->cedProf;
        $asesor->nivelEscolar   = $request->nivelEscolar;
        $asesor->noGrupos       = 0;
        $asesor->noAsesorados   =  0;
        $asesor->save();
        redirect('/');
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
        return back();
    }
}