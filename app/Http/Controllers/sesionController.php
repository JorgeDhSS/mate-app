<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use Illuminate\Support\Facades\Session;
use App\models\User;
=======
use App\User;
>>>>>>> 3f94b1679fb70036266d76325bdd4c0f8eb650e3
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
        if ($query->count() != 0){
            $hashp = $query[0]->password;
            $password = $request->get('password');
            if (password_verify($password, $hashp)){
                return view('home');
            }else {
                //return back()->withErrors(['password'=>'Contraseña no valida'])->withInput([request('password')]);
                return redirect('sesion');
            }
        }else {
            return redirect('sesion');
        }

       # $remember =request()->filled('remember_me');
      

<<<<<<< HEAD
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->flash('principal', '¡Que alegria verte de vuelta!');
          
            return redirect()->intended('home');
=======
        /*if(Auth::attempt($credentials)){
            
>>>>>>> 3f94b1679fb70036266d76325bdd4c0f8eb650e3

        }else{
            $request->session()->flash('Datos_incorrectos', 'Asegurate de escribir correctamente tus credenciales');
            return redirect('sesion');

        }
<<<<<<< HEAD

        
        

           
        
=======
        return redirect('home');*/
>>>>>>> 3f94b1679fb70036266d76325bdd4c0f8eb650e3
    }
}





