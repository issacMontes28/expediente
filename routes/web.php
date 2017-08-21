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
Route::post('pacient/addPacient','PacientController@addPacient');
Route::resource('pacient','PacientController');

//Rutas para CRUD de hojas de enfermería
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
Route::get('nurseSheet/deleter','nurseSheetController@deleter');
Route::get('nurseSheet/deleter/show_details/{id}','nurseSheetController@show_details_deleter');
Route::resource('nurseSheet','NurseSheetController');

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
Route::post('soap/{id}/UpdateSoap','SoapController@updateItem');
Route::get('/soap/create/{id}',
['uses' => 'PacientController@addsoap', 'as' => 'asignar_analisis_soap']);
Route::get('soap/show/{id}', 'SoapController@showsoap')->name('mostrar_analisis_soap');
Route::get('soap/deleter','soapController@deleter');
Route::get('soap/actualizar','soapController@actualizar');
Route::get('soap/deleter/show_details/{id}','SoapController@show_details');
Route::resource('soap', 'soapController');

Route::get('match', 'StudyController@create');
Route::get('eliminarMatch', 'StudyController@eliminar');
Route::get('match/{letra_diagnostico}', 'StudyController@diagnosticos');
Route::get('match2/{letra_estudio}', 'StudyController@estudios');
Route::post('/addMatch', 'StudyController@AddItem');
Route::get('studyCreate', 'StudyController@createEstudio');
Route::get('studyDelete', 'StudyController@eliminarEstudio');
Route::get('studyUpdate', 'StudyController@actualizarEstudio');
Route::post('studyCreate/studyStore', 'StudyController@storeEstudio')->name('agregarEstudio');
Route::delete('studyDelete/{id}', 'StudyController@destroyEstudio')->name('destroyEstudio');
Route::get('showStudy', 'StudyController@showEstudio');

Route::get('studyUpdate/show_details/{id}', 'StudyController@modifyEstudio');
Route::post('studyUpdate/update/{id}', 'StudyController@updateEstudio');
Route::post('pacient/pacientUpdate/update/{id}', 'PacientController@updatePaciente');

Route::get('soap/show/{id}', 'SoapController@showsoap')->name('mostrar_analisis_soap');
Route::get('study/show/usuario', 'StudyController@showUser');
Route::resource('study', 'studyController');
