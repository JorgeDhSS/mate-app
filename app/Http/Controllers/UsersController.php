<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth.sesion')->except('recuperarcuentaView', 'authenticateR');
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


    public function authenticateR(Request $request)
    {


        $newPasword = $request->get('newpassword');
        $clave = $request->claverecuperacion;
        $claveConfirmacion = $request->get('newpasswordC');
        #$claveInput = $request->get('claverecuperacion');
        $datos = User::select('id')
            ->where('claverecuperacion', '=', $clave)
            ->first();
        $pass = $request->newpassword;

        if ($clave != "" && $newPasword != "" && $claveConfirmacion != "") {
            if ($newPasword != $claveConfirmacion) {
               
                return view('recuperarcuenta')->with(['alert' => "Swal({
                    title: 'Vuelve a intentarlo',
                    text: 'Las contraseñas no coinciden',
                    icon: 'error',
                    showCancelButton: 'true', 
                    showConfirmButton: 'true'
                });"]);
            }
            if (!preg_match('`[A-Z]`', $newPasword)) {
                $request->session()->flash('Datos_incorrectos', 'La contraseña debe tener al menos una letra mayúscula');
                return redirect('recuperarcuenta');
            }
            if (!preg_match('`[a-z]`',$newPasword)){
                $request->session()->flash('Datos_incorrectos', 'La contraseña debe tener al menos una letra minúscula');
                return redirect('recuperarcuenta');
             }
             if(strlen($newPasword) < 6){
                $request->session()->flash('Datos_incorrectos', 'La contraseña debe tener al menos 6 caracteres');
                return redirect('recuperarcuenta');
             }
             if (!preg_match('`[0-9]`',$newPasword)){
                $request->session()->flash('Datos_incorrectos', 'La contraseña debe tener al menos un caracter numérico');
                return redirect('recuperarcuenta');
             }

            $update = User::where('id', '=', $datos->id)
                ->update([
                    'password' => Hash::make($pass)
                ]);




            return view('sesion')->with(['alert' => "Swal({
                    title: 'Éxito!',
                    text: 'Tu contraseña fue modificada',
                    icon: 'success',
                    showCancelButton: 'true', 
                    showConfirmButton: 'true'
                });"]);
        } else {
            return view('recuperarcuenta')->with(['alert' => "Swal({
                title: 'Alerta',
                text: 'No puedes dejar campos vacios',
                icon: 'error',
                showCancelButton: 'true', 
                showConfirmButton: 'true'
            });"]);
        }
    }

   

    public function cambiarcontrasenaView(Request $request) {
        return view('cambiarcontrasena');
    }
}
