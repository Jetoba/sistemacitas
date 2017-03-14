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
Route::resource('/usuarios', 'UsersController');
Route::resource('/roles', 'RolesController');
Route::resource('/users', 'UsersController');
Route::resource('/historias', 'HistoriasController@store');
Route::get('/usuarios/{id}/permisos','UsersController@permisos');
Route::put('/usuarios/{id}/asignarpermisos','UsersController@asignarPermisos');
Route::get('/cita/{id}/citamedico', 'CitasController@mostrarcitas');
Route::get('/historia/{id}/historiapaciente', 'HistoriasController@mostrarhistoria');

Route::resource('/recipes', 'RecipesController');
Route::get('/recipe/{id}/recipescita', 'RecipesController@recipescita');
Route::get('/recipe/{id}/asignar', 'RecipesController@asigne');
Route::put('/recipe/{id}/asignarmedicina', 'RecipesController@asignarmedicina');

Route::get('/historia/{id}/create', 'HistoriasController@create');
Route::get('/recipe/{id}/create', 'RecipesController@create');
Route::get('/medico/{id}/asignar', 'UsersController@asignar');
Route::put('/medico/{id}/especializacion', 'userscontroller@asignarespecializacion');
Route::resource('/medicinas', 'MedicinasController');
Route::resource('/especialidades', 'EspecialidadesController');
Route::resource('/medicos', 'UsersController@medicosindex');
Route::get('/medicos/{id}/especialidades', 'RolesController@permisos');
Route::get('/roles/{id}/permisos', 'RolesController@permisos');
Route::put('/roles/{id}/asignarpermisos','RolesController@asignarPermisos');
Route::resource('/permisos', 'PermissionsController');
