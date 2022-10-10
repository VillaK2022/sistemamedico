<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;
use Barryvdh\DomPDF\Facade\Pdf;
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
    return view('auth.login');
});

Route::resource('pacientes','App\Http\Controllers\PacienteController');
Route::resource('medicos','App\Http\Controllers\MedicoController');
Route::resource('enfermeros','App\Http\Controllers\EnfermeroController');
Route::resource('citas','App\Http\Controllers\CitaController');
Route::resource('index','App\Http\Controllers\IndexController');
Route::get('examenfisico/{id}','App\Http\Controllers\ExamenFisicoController@index');
Route::post('examenfisico','App\Http\Controllers\ExamenFisicoController@store');
Route::get('inicio','App\Http\Controllers\PacienteController@index2');
Route::get('buscar','App\Http\Controllers\PacienteController@buscarCedula');
Route::get('atencion/{id}','App\Http\Controllers\AtencionController@index');
Route::post('atencion/registrar','App\Http\Controllers\AtencionController@store');
Route::get('imprimir/medico', 'App\Http\Controllers\MedicoController@imprimir');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
/* Route::get('/dash/crud', function () {
    return view('crud.index');
});

Route::get('/dash/crud/create', function () {
    return view('crud.create');
}); */