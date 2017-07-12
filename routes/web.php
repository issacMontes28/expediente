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
Route::get('pacient/deleter','PacientController@deleter');
Route::get('pacient/actualizar','PacientController@actualizar');
//sub-rutas para extraer el detalle del paciente
Route::get('pacient/show_details/{id}','PacientController@show_details');
Route::get('pacient/pacient/show_details/{id}','PacientController@show_details');
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


//Rutas para doctores
Route::get('doctor/deleter','DoctorController@deleter');
Route::get('doctor/actualizar','DoctorController@actualizar');
Route::resource('doctor', 'DoctorController');

//Rutas para citas
Route::get('/date/create/{id}',
['uses' => 'PacientController@adddate', 'as' => 'asignar_cita_paciente']);
Route::get('date/deleter','DateController@deleter');
Route::get('date/actualizar','DateController@actualizar');
Route::get('date/show/{id}', 'DateController@show_date_pacient')->name('paciente_cita');
Route::resource('date', 'DateController');
//
//Rutas para soap
//ruta para obtener los diagnósticos
Route::get('find', 'SoapController@diagnosticos');
Route::post('soap/create/AddSoap','SoapController@addItem');
Route::get('/soap/create/{id}',
['uses' => 'PacientController@addsoap', 'as' => 'asignar_analisis_soap']);
Route::get('soap/show/{id}', 'SoapController@showsoap')->name('mostrar_analisis_soap');
Route::get('soap/deleter','soapController@deleter');
Route::get('soap/actualizar','soapController@actualizar');
Route::get('soap/deleter/show_details/{id}','SoapController@show_details');
Route::resource('soap', 'soapController');

Route::get('match', 'StudyController@create');
Route::post('/addMatch', 'StudyController@AddItem');
