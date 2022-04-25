<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class PracticanteController extends Controller{

    public function mostrarCuadernos(){

        return view('practicante_views.cuadernillo');
    }

}