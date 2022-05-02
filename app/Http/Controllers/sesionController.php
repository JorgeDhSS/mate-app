<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        /*if(Auth::attempt($credentials)){
            

        }
        return redirect('home');*/
    }
}





