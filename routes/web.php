<?php

use Illuminate\Support\Facades\Route;

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

Route::get('perfil/{id}', 'UsuarioController@profile')->name('user.profile');
Route::post('user/eliminar-medico', 'UsuarioController@eliminarMedico')->name('user.eliminarMedico');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('avatar/{filename}', 'UsuarioController@getImage')->name('user.avatar');

// Centros de salud
Route::get('centros-salud', 'CentroSaludController@index')->name('centro-salud.index');
Route::get('crear-centro-salud', 'CentroSaludController@create')->name('centro-salud.create');
Route::post('centro-salud/save', 'CentroSaludController@save')->name('centro-salud.save');
Route::get('centro-salud/imagen/{filename}', 'CentroSaludController@getImage')->name('centro-salud.imagen');

// Médicos
Route::get('medicos', 'MedicoController@index')->name('medico.index');
Route::get('crear-medico', 'MedicoController@create')->name('medico.create');
Route::post('medico/save', 'MedicoController@save')->name('medico.save');
Route::get('medico/imagen/{filename}', 'MedicoController@getImage')->name('medico.imagen');

// Atención médica
Route::get('atenciones', 'AtencionMedicaController@index')->name('atencion.index');
Route::get('atencion-medico/{id}', 'AtencionMedicaController@atencionMedico')->name('atencion.medico');
Route::get('atencion-centro-salud/{id}', 'AtencionMedicaController@atencionCentroSalud')->name('atencion.centro-salud');
Route::post('atencion-medico/save', 'AtencionMedicaController@saveMedico')->name('atencion.saveMedico');
Route::post('atencion-centro-salud/save', 'AtencionMedicaController@saveCentroSalud')->name('atencion.saveCentroSalud');
Route::get('editar/{id}', 'AtencionMedicaController@edit')->name('atencion.edit');
Route::post('editar/update', 'AtencionMedicaController@update')->name('atencion.update');