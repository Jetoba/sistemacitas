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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/cita', 'CitasController');
Route::resource('/roles', 'RolesController');
Route::resource('/users', 'UsersController');
Route::get('/cita/{id}/citamedico', 'CitasController@mostrarcitas');
Route::get('/medico/{id}/asignar', 'UsersController@asignar');
Route::put('/medico/{id}/especializacion', 'userscontroller@asignarespecializacion');
Route::resource('/medicinas', 'MedicinasController');
Route::resource('/especialidades', 'EspecialidadesController');
Route::resource('/medicos', 'UsersController@medicosindex');
Route::get('/medicos/{id}/especialidades', 'RolesController@permisos');
Route::get('/roles/{id}/permisos', 'RolesController@permisos');
Route::put('/roles/{id}/asignarpermisos','RolesController@asignarPermisos');
Route::resource('/permisos', 'PermissionsController');
