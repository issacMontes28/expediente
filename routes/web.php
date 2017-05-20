<?php

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


Route::resource('log','LogController');
Route::get('/', function () {
    return view('login');
});
Route::get('/logout', 'LogController@logout');
Route::get('index', function () {
    return view('layouts/admin');
});

//Rutas para CRUD de Pacientes
Route::get('pacient/towns/{id}', 'PacientController@getTowns');
Route::get('pacient/towns/{id_estado}/localities/{id_municipio}', 'PacientController@getLocalities');
Route::get('pacient/{id_paciente}/towns/{id}', 'PacientController@getTowns2');
Route::get('pacient/{id_paciente}/towns/{id_estado}/localities/{id_municipio}', 'PacientController@getLocalities2');
Route::resource('pacient','PacientController');

//Rutas para CRUD de hojas de enfermería
Route::resource('nurseSheet','NurseSheetController');
Route::post('nurseSheet/create/AddNurseSheet','NurseSheetController@addItem');
Route::get('nurseSheet/create/pdf','NurseSheetController@reporte');
Route::get('/nurseSheet/show/',
['uses' => 'NurseSheetController@registros_fecha', 'as' => 'fecha_nursesheet']);
Route::get('/nurseSheet/create/{id}',
['uses' => 'PacientController@addNurseSheet', 'as' => 'asignar_hde']);
Route::get('nurseSheet/create/hojas', function () {
    return redirect('/nurseSheet/show');
})->name('profile');
Route::get('nurseSheet/create/pdf','NurseSheetController@reporte');
