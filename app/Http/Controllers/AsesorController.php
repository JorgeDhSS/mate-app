<?php
    
namespace App\Http\Controllers;

use App\Practicante;
use App\User;
use Illuminate\Http\Request;

class AsesorController extends Controller{
    
    public function groupPractView(){
        return view('asesor_views.groupPract');
    }

    public function asignarTutorView(){
        return view('asesor_views.asignarTutor');
    }
    public function buscarPracticante(Request $request)
    {
        $practicantes = User::whereHas('practicante', function ($query) use($request){
            $query->where('name', 'like', '%'.$request->name.'%');
        })->get();
        $view = view('asesor_views.practicantesLista', ["users" => $practicantes])->render();
        return (["html" => $view]);
    }
}

?>