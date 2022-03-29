<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registroController extends Controller
{
    public function createRegistroView()
    {
        return view('asesor_views.registro');
    }
}
