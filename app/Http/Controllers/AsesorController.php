<?php
    
namespace App\Http\Controllers;

use App\Actividad;
use App\ActividadCuadernillo;
use App\Cuadernillo;
use App\Practicante;
use App\User;
use Illuminate\Http\Request;
use App\Grupo;
use App\Leccion;
use App\PracticanteGrupo;
use App\Tutor;
use Exception;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Throwable;

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
            ->select('users.name', 'tutors.curp', 'tutors.numberPhone', 'tutors.user_id as id')
            ->where('users.name', 'like', '%'.$request->name.'%')
            ->get();
            
            $view = view('asesor_views.tutorList', ["tutors" => $tutores])->render();
            return (["html" => $view]);
    }

    public function enviarAsignacion(Request $request){
        $practicante = Practicante::find($request->idPracticante);
        $practicante->tutor_id = $request->idTutor;
        $practicante->save();
        
        return view('asesor_views.asignarTutor');
    }

    public function actividadToCuadernilloView(Request $request)
    {
        //$asesor = Asesor::where('user_id', Auth::id())->first();
        //$activities = Actividad::where('asesor_id', $asesor->id)->get();
        $activities = Actividad::where('asesor_id', 1)->get();
        return view('asesor_views.activityToCuadernillo', ['activities' => $activities]);
    }

    public function actividadToCuadernilloStore(Request $request)
    {
        try{
            $cuadernillo = new Cuadernillo();
            $cuadernillo->nombre = $request->nombre;
            $cuadernillo->tema = $request->tema;
            $cuadernillo->asesor_id = 1;
            $cuadernillo->save();
            if(count($request->activities))
            {
                foreach($request->activities as $activity)
                {
                    $activityCuadernillo = new ActividadCuadernillo();
                    $activityCuadernillo->actividad_id = $activity;
                    $activityCuadernillo->cuadernillo_id = $cuadernillo->id;
                    $activityCuadernillo->save();
                }
            }
            else{
                return back()->with(['alert' => "Swal.fire(
                    'Error!',
                    'Debe seleccionar al menos una actividad',
                    'error',
                    showCancelButton: false, // There won't be any cancel button
                    showConfirmButton: false
                )"]);
            }
            return back()->with(['alert' => "Swal.fire(
                'Éxito!',
                'Se agregaron las actividades',
                'success',
                showCancelButton: false, // There won't be any cancel button
                showConfirmButton: false
            )"]);
        } catch (Throwable $e) {
            return back()->with(['alert' => "Swal.fire(
                'Error!',
                'Algo salio mal, intente de nuevo',
                'error',
                showCancelButton: false, // There won't be any cancel button
                showConfirmButton: false
            )"]);
        }
    }

    public function listaActividadesLeccion(Request $request)
    {
        $actividades = Actividad::doesntHave('leccion')->get();
        $lecciones = Leccion::get();
        return view('asesor_views.listActitiesLections', ['activities' => $actividades, 'leccions' => $lecciones]);
        //echo json_encode($actividades);
    }

    public function leccionAtividadPut(Request $request)
    {
        
            $actividad = Actividad::find($request->id_activity);
            $actividad->leccion_id = $request->id_leccion;
            $actividad->save();
            return back();
            
    }
}

?>