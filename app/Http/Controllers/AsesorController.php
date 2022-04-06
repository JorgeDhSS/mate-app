<?php
    
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practicante;
use App\User;
use App\Grupo;
use App\PracticanteGrupo;

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
            ->where('practicantes', 'users.name', 'LIKE', '%{ $request->nombrePrat }%')
            ->select('users.name', 'practicantes.matricula', 'practicantes.nivelEscolar', 'practicantes.id')
            ->paginate(8);

            /*$buscarPracticante = User::join('practicantes', 'users.name', 'LIKE', '%{ $request->nombrePrat }%')
                ->on('users.id', '=', 'practicantes.user_id')
                ->select('users.name', 'practicantes.matricula', 'practicantes.nivelEscolar', 'practicantes.id')
                ->paginate(8);*/

            return view('tableSearchPract.blade.php', array('practicantesBuscar' => $buscarPracticante));
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