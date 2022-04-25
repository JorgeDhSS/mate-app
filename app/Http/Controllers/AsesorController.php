<?php
    
namespace App\Http\Controllers;

use App\Actividad;
use App\Asesor;
use App\Practicante;
use App\User;
use Illuminate\Http\Request;
use App\Grupo;
use App\PracticanteGrupo;
use App\Tutor;
use Illuminate\Support\Facades\Auth;

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
        try {
            $buscarPracticante = User::join('practicantes', 'users.id', '=', 'practicantes.user_id')
                ->select('users.name', 'practicantes.matricula', 'practicantes.nivelEscolar', 'practicantes.id')
                ->where('users.name', '=', '%'.$request->nombrePrat.'%')
                ->paginate(8);

            /*$buscarPracticante = User::join('practicantes', 'users.name', 'LIKE', '%{ $request->nombrePrat }%')
                ->on('users.id', '=', 'practicantes.user_id')
                ->select('users.name', 'practicantes.matricula', 'practicantes.nivelEscolar', 'practicantes.id')
                ->paginate(8);*/

            $view = view('asesor_views.tableSearchPract', ['practicantesBuscar' => $buscarPracticante])->render();
            return (['html' => $view]);
        } catch (\Throwable $th) {
            return (['status' => 'fail']);
        }
        
    }

    public function saveGroup(Request $request){
        date_default_timezone_set("America/Mexico_City");

        try {
            $grupo = new Grupo();
            $grupo->nombreGrupo = $request->nameGroup;
            $grupo->nivelEscolar = $request->levelSchool;
            $grupo->save();

            foreach($request->practicante as $check){
                $practicanteGrupo = new PracticanteGrupo();
                $practicanteGrupo->practicante_id = $check;
                $practicanteGrupo->grupo_id = $grupo->id;
                $practicanteGrupo->fechaActividad = date("Y-m-d");
                $practicanteGrupo->save();
            }    

            return (['status' => 'ok']);
        } catch (\Exception $th) {
            return (['status' => 'fail', 'exception' => $th->__toString()]);
        }
    }
    public function asignarTutorView(){
        // $tutores = Tutor::join('users', 'users.id', '=', 'tutors.user_id')
        //     ->select('users.name', 'tutors.CURP', 'tutors.numberPhone')
        //     ->get();
        return view('asesor_views.asignarTutor');
        //return view('asesor_views.asignarTutor', array('tutores'=>$tutores));
    }

    
    
    public function buscarPracticante(Request $request){
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

            return view('asesor_views.tutorList', ['tutores' => $tutores])->render();
    }

    public function actividadToCuadernilloView(Request $request)
    {
        //$asesor = Asesor::where('user_id', Auth::id())->first();
        //$activities = Actividad::where('asesor_id', $asesor->id)->get();
        $activities = Actividad::where('asesor_id', 1)->get();
        return view('asesor_views.activityToCuadernillo', ['activities' => $activities]);
    }
}

?>