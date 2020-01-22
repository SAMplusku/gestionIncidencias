<?php

use App\Incidencia;


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

Route::get('/perfil/{id}', 'PersonaController@show')->name('perfil')->middleware('auth');

Route::get('/login', function (){ return view('login'); })->name('login');
Route::get('/login/check', 'UserController@check')->name('login.check');
Route::get('/signup', function (){
    return view('signup');
})->name('signup');

Route::get('/signup/sendMail', 'UserController@enviarEmailCoordinador')->name('signup.enviarEmail');

Route::get('/index', function(){return view('index');})->name('index')->middleware('auth');

<<<<<<< HEAD
Route::get('/signup/storeUser', 'UserController@store')->name('signup.storeUser')->middleware('auth');
Route::get('/signup/darAlta', function(){ return view('darAlta'); })->name('signup.darAlta')->middleware('auth');
Route::get('/incidencia', function () {
    return view('incidencia');
})->name('incidencia')->middleware('auth');
=======
Route::get('/signup/storeUser', 'UserController@store')->name('signup.storeUser');
Route::get('/signup/darAlta', function(){ return view('darAlta'); })->name('signup.darAlta');
Route::get('/incidencia', 'TecnicoController@detalleTecnicos')->name('incidencia');
>>>>>>> arkaitz-desarrollo

Route::get('/anadir', 'incidenciaController@store')->middleware('auth');

Route::get('/signup/store', function (){
    return view('signup');
})->name('signup.store')->middleware('auth');

<<<<<<< HEAD
Route::get('/busquedaTrabajadores', 'PersonaController@index')->middleware('auth');
=======


Route::get('/busquedaTrabajadores', 'PersonaController@index');
>>>>>>> arkaitz-desarrollo


<<<<<<< HEAD

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/busquedaTrabajadores/fecha', 'PersonaController@showFecha');

Route::get('/busquedaTrabajadores/operador', 'PersonaController@showOperadores');

Route::get('/busquedaTrabajadores/gerente', 'PersonaController@showGerente');

Route::get('/busquedaTrabajadores/tecnico', 'PersonaController@showTecnico');

Route::get('/busquedaTrabajadores/coordinador', 'PersonaController@showCoordinador');

Route::get('/busquedaTrabajadores/tecnico/mañana', 'PersonaController@showMañana');

Route::get('/busquedaTrabajadores/tecnico/tarde', 'PersonaController@showTarde');

Route::get('/busquedaTrabajadores/tecnico/noche', 'PersonaController@showNoche');

Route::get('/busquedaTrabajadores/tecnico/disponible', 'PersonaController@showDisponible');

Route::get('/busquedaTrabajadores/tecnico/noDisponible', 'PersonaController@showNodisponible');

Route::get('/busquedaTrabajadores/tecnico/alava', 'PersonaController@showAlava');

Route::get('/busquedaTrabajadores/tecnico/guipuzcoa', 'PersonaController@showGuipuzcoa');

Route::get('/busquedaTrabajadores/tecnico/vizcaya', 'PersonaController@showVizcaya');

Route::get('/buscadorTrabajadores', 'PersonaController@showTrabajadores');




>>>>>>> arkaitz-desarrollo
