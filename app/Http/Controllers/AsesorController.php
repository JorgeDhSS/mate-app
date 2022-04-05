<?php
    
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practicante;
use App\User;
use App\Grupo;

class AsesorController extends Controller{
    
    public function groupPractView(){
        return view('asesor_views.groupPract');
    }

    public function showTablePract(){
        $resultado = Practicante::join('users', 'users.id', '=', 'practicantes.user_id')
            ->select('users.name', 'practicantes.matricula', 'practicantes.nivelEscolar', 'practicantes.id')
            ->paginate(8);

        return view('asesor_views.groupPract', array('resultados'=>$resultado));
    }

    public function searchNameGroup(Request $request){
        if ($consulta = Grupo::where('nombreGrupo', $request->nombreGrupo)->exists()) {
            return (['status' => 'ok']);
        }else {
            return (['status' => 'fail']);
        }
    }

    //Buscar practicante
    public function searchNamePract(Request $request){
        $nombre = User::where('name', 'LIKE', '%{ $request->nombrePrat }%')->paginate(8);
        
    }

    public function saveGroup(Request $request){
        $grupo = new Grupo();
            /*$grupo->nam,me = $request->name;
            $grupo->save(;);

            foreach($request->btnCheckbox as $check)
            {
                $pg = nwew PracticantreGrupo()
            ;
        
        $pg->practicante_id = $check
        $pg->grupo_id = $grupo->id;
        }*/
    }
    public function asignarTutorView(){
        return view('asesor_views.asignarTutor');
    }

}

?>