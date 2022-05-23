<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;

class UsersController extends Controller
{
    public function modifyDataView()
    {
        $idUser = Auth::user()->id;
        $datos = User::select('name', 'email', 'password', 'claverecuperacion')
            ->where('id', '=', $idUser)
            ->first();

        return view('modifyData')->with([
            'datos' => $datos
        ]);
    }

    public function guardarCambios(Request $request)
    {
        $name = $request->get('username');
        $email = $request->get('email');
        $claverecuperacion = $request->get('claverecuperacion');

        $idUser = Auth::user()->id;
        $datos = User::select('name', 'email', 'password', 'claverecuperacion')
            ->where('id', '=', $idUser)
            ->first();

        if ($datos->name != $name && $datos->email != $email && $datos->claverecuperacion != $claverecuperacion) {
            $update = User::where('id', '=', $idUser)
                ->update(['name' => $name, 'email' => $email, 'claverecuperacion' => $claverecuperacion]);
        } else if ($datos->name != $name) {
            $update = User::where('id', '=', $idUser)
                ->update(['name' => $name]);
        } else if ($datos->email != $email) {
            $update = User::where('id', '=', $idUser)
                ->update(['email' => $email]);
        } else if ($datos->claverecuperacion != $claverecuperacion) {
            $update = User::where('id', '=', $idUser)
                ->update(['claverecuperacion' => $claverecuperacion]);
        }

        $datos2 = User::select('name', 'email', 'password', 'claverecuperacion')
            ->where('id', '=', $idUser)
            ->first();

        return view('modifyData')->with([
            'datos' => $datos2
        ]);
    }

    public function recuperarcuentaView(Request $request)
    {
        return view('recuperarcuenta');
    }


    public function authenticateR(Request $request)
    { 
        $clave = $request->claverecuperacion;
        $datos = User::select('id')
            ->where('claverecuperacion', '=', $clave)
            ->first();
        $pass = $request->newpassword;
        
        

        if($clave != ""){
            $update = User::where('id', '=', $datos->id)
            ->update(['password' => Hash::make($pass)]);
        }

    }

    public function cambiarcontrasenaView(Request $request) {
        return view('cambiarcontrasena');
    }
}
