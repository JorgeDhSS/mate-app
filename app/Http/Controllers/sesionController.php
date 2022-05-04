<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\models\User;
#use Illuminate\Validation\ValidationException;

class sesionController extends Controller{
    
    public function LoginView() {
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
        


       # $remember =request()->filled('remember_me');
      

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->flash('principal', '¡Que alegria verte de vuelta!');
          
            return redirect()->intended('home');

        }else{
            $request->session()->flash('Datos_incorrectos', 'Asegurate de escribir correctamente tus credenciales');
            return redirect('sesion');

        }

        
        

           
        
    }
}





