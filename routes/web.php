<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registroController;
use App\Http\Controllers\sesionController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\PracticanteController;
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
    return view('welcome');
});
Route::get('director/addAsesor','DirectorController@createAsesorView')->name('director.addAsesorView');
Route::post('director/createUser','DirectorController@createUser')->name('director.createUser');
Route::post('director/saveAsesor','DirectorController@saveAsesor')->name('director.saveAsesor');



//RUTA PARA MOSTRAR LA VISTA DE REGISTRO DE TUTOR Y PRACTICANTE 
Route::get('asesor/addUsario','registroController@createRegistroView')->name('asesor.addUsuario');

Route::get('director/addAsesor','DirectorController@createAsesorView')->name('director.addAsesor');

//Agrupar practicante
Route::get('asesor/groupPract', 'AsesorController@groupPractView')->name('asesor.groupPract');
Route::get('asesor/groupPract', 'AsesorController@showTablePract')->name('asesor.groupPract');

Route::get('asesor/actividadnueva',[ActividadesController::class, 'create'])->name('asesor_views.addActividades');


//RUTA PARA AGREGAR TUTOR A LA BD - A
Route::post('asesor/enviarTutor', [TutorController::class, 'enviarTutor'])->name('tutor.enviarTutor');

//RUTA PARA AGREGAR PRACTICANTE A LA BD - A
Route::post('asesor/enviarPracticante', [PracticanteController::class, 'enviarPracticante'])->name('practicante.enviarPracticante');
