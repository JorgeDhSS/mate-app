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
        $resultados = Practicante::join('users', 'users.id', '=', 'practicantes.user_id')
            //->where('practicantes.nivelEscolar', '=', $request->nivelEscolar)
            ->select('users.name', 'practicantes.matricula', 'practicantes.nivelEscolar', 'practicantes.id')
            ->paginate(8);

        return view('asesor_views.groupPract', compact('resultados'));
    }

    public function searchNameGroup(Request $request){
        if ($consulta = Grupo::where('nombreGrupo', $request->nombreGrupo)->exists()) {
            return (['status' => 'ok']);
        }else {
            return (['status' => 'fail']);
        }
    }

    public function saveGroup(Request $request){
        date_default_timezone_set("America/Mexico_City");
        $json = json_decode($request->jsonPracticantes, true);

        try {
            $grupo = new Grupo();
            $grupo->nombreGrupo = $request->btnNamegroup;
            $grupo->nivelEscolar = $request->levelSchool;
            $grupo->save();

            foreach($json as $practicante){
                $practicanteGrupo = new PracticanteGrupo();
                $practicanteGrupo->practicante_id = $practicante['id_practicante']; //Array 
                $practicanteGrupo->grupo_id = $grupo->id;
                $practicanteGrupo->fechaActividad = date("Y-m-d");
                $practicanteGrupo->save();
            }    

            return view('asesor_views.groupPract');
        } catch (\Exception $th) {
            return (['status' => 'fail', 'exception' => $th->__toString()]);
        }
    }
    public function asignarTutorView(){ 
        return view('asesor_views.asignarTutor');
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
            ->select('users.name', 'tutors.curp', 'tutors.numberPhone', 'users.id')
            ->where('users.name', 'like', '%'.$request->name.'%')
            ->get();
        
        $view = view('asesor_views.tutorList', ["tutors" => $tutores])->render();
        return (["html" => $view]);
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