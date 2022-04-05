<?php
    
namespace App\Http\Controllers;

class AsesorController extends Controller{
    
    public function groupPractView(){
        return view('asesor_views.groupPract');
    }

    public function asignarTutorView(){
        return view('asesor_views.asignarTutor');
    }

}

?>