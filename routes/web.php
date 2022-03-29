<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registroController;
use App\Http\Controllers\sesionController;
use App\Http\Controllers\AsesorController;
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
    return view('home');
});
Route::get('director/addAsesor','DirectorController@createAsesorView')->name('director.addAsesor');
Route::get('asesor/groupPract', 'AsesorController@groupPractView')->name('asesor.groupPract');