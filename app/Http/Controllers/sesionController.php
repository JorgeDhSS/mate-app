<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
#use Illuminate\Validation\ValidationException;

class sesionController extends Controller{

    public function LoginView(Request $request) {
        return view('sesion');
    }

    #public function store(Request $request){

        
    #}
 
    public function authenticate(Request $request){
       #return request()->only('name','email','password');
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password'=> ['required'],
        ]);
        


        if (Auth::attempt($credentials)) {
            $con = 'OK';
        }
        
        
        $email = $request->get('email');
        $query = User::where('email', '=', $email)->get();

        $name = $request->get('name');
        $queryN = User::where('name', '=', $name)->get();
        
            if ($query->count() != 0){
                $hashp = $query[0]->password;
                $password = $request->get('password');
    
                    if($queryN->count() != 0){
    
                        $hashpn = $queryN[0]->name;
                        $name = $request->get('name');
                        
                    }else {
                        $request->session()->flash('Datos_incorrectos', 'Nombre de usuario no encontrado');
                        return redirect('sesion');
                        
                    }
    
                if (password_verify($password, $hashp)){
                    return redirect()->route('data.modifyData');
                }else {
                    
                    $request->session()->flash('Datos_incorrectos', 'Tu contraseña no coincide con tu nombre de usuario');
                    return redirect('sesion');
                  
                }
               
            }else {
                $request->session()->flash('Datos_incorrectos', 'El email no coincide con tu nombre de usuario');
                return redirect('sesion');
            }
            
            

      


        
        
        


       # $remember =request()->filled('remember_me');
        
    }

    public function logout(){
        try{
            Auth::logout();
            return view('sesion');
        } catch (\Exception $th){
            return back()->withErrors(['Error'=>'Al cerrar sesión']);
        }
    }
}





