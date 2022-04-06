<?php
    
namespace App\Http\Controllers;

use App\Practicante;
use App\User;
use Illuminate\Http\Request;
use App\Grupo;
use App\Tutor;

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
        // $tutores = Tutor::join('users', 'users.id', '=', 'tutors.user_id')
        //     ->select('users.name', 'tutors.CURP', 'tutors.numberPhone')
        //     ->get();
        return view('asesor_views.asignarTutor');
        //return view('asesor_views.asignarTutor', array('tutores'=>$tutores));
    }
    public function buscarPracticante(Request $request)
    {
        $practicantes = User::whereHas('practicante', function ($query) use($request){
            $query->where('name', 'like', '%'.$request->name.'%');
        })->get();
        $view = view('asesor_views.practicantesLista', ["users" => $practicantes])->render();
        return (["html" => $view]);
    }
    public function buscarTutor(Request $request){
        $tutores = Tutor::join('users', 'users.id', '=', 'tutors.user_id')
            ->select('users.name', 'tutors.CURP', 'tutors.numberPhone')
            ->get();

        $tutorBuscado = $request->tutor;

            return view('asesor_views.tutorList', ['tutores' => $tutores, 'buscado' => $tutorBuscado])->render();
    }
}

?>