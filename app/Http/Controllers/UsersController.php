<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth.sesion')->except('');
    }

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


    /*public function authenticateR(Request $request)
    { 
        $clave = $request->claverecuperacion;
        $datos = User::select('id')
            ->where('claverecuperacion', '=', $clave)
            ->first();
        $name = $request->newname;
        
        
        if($clave != ""){
            $update = User::where('id', '=', $datos->id)
            ->update(['name' => $name]);
        }
    }*/

    public function authenticateR(Request $request)
    {
        #return request()->only('name','email','password');


        $email = $request->get('email');
        $query = User::where('email', '=', $email)->get();

        $name = $request->get('name');
        $queryN = User::where('name', '=', $name)->get();

        $claverecuperacion = $request->get('claverecuperacion');
        $queryC = User::where('claverecuperacion', '=', $claverecuperacion)->get();

        if ($query->count() != 0) {
            
            $claverecuperacion = $request->get('claverecuperacion');

            if ($queryN->count() != 0) {

                $hashpn = $queryN[0]->name;
                $name = $request->get('name');
            } else {
                $request->session()->flash('Datos_incorrectos', 'Nombre de usuario no encontrado');
                return redirect('recuperarcuenta');
            }
            if($queryC->count() != 0){
                $hashpn = $queryN[0]->name;
                $claverecuperacion = $request->get('claverecuperacion');
                return redirect('home');


            }else{
                $request->session()->flash('Datos_incorrectos', 'Clave de recuperacion incorrecta');
                return redirect('recuperarcuenta');

            }
        } else {
            $request->session()->flash('Datos_incorrectos', 'El email no coincide con tu nombre de usuario');
            return redirect('recuperarcuenta');
        }


        # $remember =request()->filled('remember_me');

    }

    public function cambiarcontrasenaView(Request $request) {
        return view('cambiarcontrasena');
    }
}
