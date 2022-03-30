<?php
    
namespace App\Http\Controllers;

use App\Practicante;
use App\User;

class AsesorController extends Controller{
    
    public function groupPractView(){
        return view('asesor_views.groupPract');
    }

    public function showTablePract(){
        $resultado = Practicante::join('users', 'users.id', '=', 'practicantes.user_id')
            ->select('users.name', 'practicantes.matricula', 'practicantes.nivelEscolar')
            ->get();

        return view('asesor_views.groupPract', array('resultados'=>$resultado));
    }

}

?>