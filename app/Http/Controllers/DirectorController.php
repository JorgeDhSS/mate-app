<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectorController extends Controller
{
    public function createAsesorView()
    {
        return view('director_views.createAsesor');
    }
}
