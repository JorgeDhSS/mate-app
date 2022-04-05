<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;

class sesionController extends Controller{
    
    public function LoginView() {
        return view('sesion');
    }

    #public function store(Request $request){

        
    #}
 
    public function store(Request $request){
        return request()->only('name','email','password');
        $credentials = request()->only('name','email','password');
        if(Auth::attempt($credentials)){
            return 'estas dentro';
           
        }else{
            return 'no estas dentro';

        }
    }
}


