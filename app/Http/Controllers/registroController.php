<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\User;

class registroController extends Controller
{
    public function createRegistroView()
    {
        return view('asesor_views.registro');
    }
}
