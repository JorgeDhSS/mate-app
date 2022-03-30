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
            $objDemo = new \stdClass();
            $objDemo->demo_one = 'Demo One Value';
            $objDemo->demo_two = 'Demo Two Value';
            $objDemo->sender = 'SenderUserName';
            $objDemo->receiver = 'ReceiverUserName';
 
            Mail::to($user->email)->send(new SendWelcomeEmail($objDemo));
            return (['status' => 'ok', 'hashedPassword' => $user->password, 'userId' => $user->id]);
        }catch(Exception $e)
        {
            return (['status' => 'fail', 'exception' => $e->__toString()]);
        }
    }
    public function saveAsesor(Request $request)
    {
        $asesor = new Asesor();
        $asesor->user_id = $request->userId;
        $asesor->cedProfesional = $request->cedProf;
        $asesor->nivelEscolar = $request->nivelEscolar;
        $asesor->save();
        redirect('/');
    }
}
