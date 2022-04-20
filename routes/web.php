<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sesionController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\registroTPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('');
});
Route::get('director/addAsesor','DirectorController@createAsesorView')->name('director.addAsesor');
Route::get('sesion','sesionController@LoginView')->name('sesion.index');
Route::post('sesion','sesionController@authenticate')->name('sesion.authenticate');
Route::get('home','homeController@HomeView')->name('home.index');

Route::get('director/addAsesor','DirectorController@createAsesorView')->name('director.addAsesorView');
Route::post('director/createUser','DirectorController@createUser')->name('director.createUser');
Route::post('director/saveAsesor','DirectorController@saveAsesor')->name('director.saveAsesor');



//RUTA PARA MOSTRAR LA VISTA DE REGISTRO DE TUTOR Y PRACTICANTE 
Route::get('asesor/addUsuario','registroTPController@createRegistroView')->name('asesor.addUsuario');

Route::get('director/addAsesor','DirectorController@createAsesorView')->name('director.addAsesor');

//Agrupar practicante
Route::get('asesor/groupPract', 'AsesorController@groupPractView')->name('asesor.groupPract');
Route::get('asesor/groupPract', 'AsesorController@showTablePract')->name('asesor.groupPract');
Route::post('asesor/groupPract/searchNameGroup', 'AsesorController@searchNameGroup')->name('asesor.searchNameGroup');
Route::post('asesor/groupPract/searchNamePract', 'AsesorController@searchNamePract')->name('asesor.searchNamePract');
Route::post('asesor/tableSearchPract', 'AsesorController@tableSearchPract')->name('asesor.tableSearchPract');
Route::post('asesor/groupPract', 'AsesorController@saveGroup')->name('asesor.saveGroup');

//Agregar actividad

Route::get('asesor/actividadnueva',[ActividadesController::class, 'create'])->name('asesor_views.addActividades');

Route::post('asesor/actividadnueva', [ActividadesController::class, 'showGrupo'])->name('addActividades.agrega');

Route::post('asesor/actividadnueva', [ActividadesController::class, 'guardarActividad'])->name('addActividades.agrega');
//AGREGAR RESPUSTAS 
Route::get('asesor/addAnswer',[ActividadesController::class, 'addAnswerView'])->name('Answer.index');

//Agregar respuesta 'asesor_views.addRespuestas'

Route::get('/asesor/respuesta',[ActividadesController::class, 'createRespuestas'])->name('asesor_views.respuestas');
Route::get('/addActividades/mostrarActividades/{id}', [ActividadesController::class, 'mostrarActividades'])->name('respuestas.mostrarActividades');
Route::post('/actividadnueva/guardarPregunta/', [ActividadesController::class, 'guardarPregunta'])->name('respuesta.guardarPregunta');

//ENVIAR TUTOR O PRACTICANTE
Route::post('asesor/enviarUsuario', [registroTPController::class, 'enviarUsuario'])->name('asesor.enviarUsuario');


//VISTA PARA MOSTRAR ASIGNAR TUTOR
Route::get('asesor/asignarTutor','AsesorController@asignarTutorView')->name('asesor.asignarTutor');
Route::post('asesor/buscarPracticante','AsesorController@buscarPracticante')->name('asesor.buscarPracticante');


//VISTA PARA BUSCAR TUTOR
Route::post('asesor/buscarTutor', [AsesorController::class, 'buscarTutor'])->name('asesor.buscarTutor');
Route::post('asesor/tutorList', [AsesorController::class, 'tutorList'])->name('asesor.tutorList');
