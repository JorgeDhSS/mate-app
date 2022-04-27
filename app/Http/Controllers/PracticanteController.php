<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class PracticanteController extends Controller{
    
    public function showActivity(){
        
        
        return view('practicante_views.showActivity');
    }

    public function mostrarCuadernos(){

        return view('practicante_views.cuadernillo');
    }

}