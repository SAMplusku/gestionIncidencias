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

Route::get('/data.php', function (){
    ob_start();
    require(path("public")."data.php");
    return ob_get_clean();
});

Route::get('/signup/sendMail', 'UserController@enviarEmailCoordinador')->name('signup.enviarEmail');




Route::get('/signup/storeUser', 'UserController@store')->name('signup.storeUser')->middleware('auth');
Route::get('/signup/darAlta', function(){ return view('darAlta'); })->name('signup.darAlta')->middleware('auth');
/*Route::get('/incidencia', function () {
    return view('incidencia');
})->name('incidencia')->middleware('auth');*/

Route::get('/incidencia', 'TecnicoController@detalleTecnicos')->name('incidencia')->middleware('auth');

Route::get('/incidencia/{id}', 'IncidenciaController@show')->middleware('auth');

Route::get('/anadir', 'incidenciaController@store')->middleware('auth');

Route::get('/cerrarSesion', 'UserController@cerrarSesion')->middleware('auth');

Route::get('/signup/store', function (){
    return view('signup');
})->name('signup.store')->middleware('auth');

Route::get('/busquedaTrabajadores', 'PersonaController@index')->middleware('auth');

Route::get('/estadisticas', function () {
    return view("estadisticas");
});

Route::get('/index', function(){return view('index');})->name('index')->middleware('auth');

Auth::routes();

Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);


Route::get('/busquedaTrabajadores/fecha', 'PersonaController@showFecha')->middleware('auth');

Route::get('/busquedaTrabajadores/operador', 'PersonaController@showOperadores')->middleware('auth');

Route::get('/busquedaTrabajadores/gerente', 'PersonaController@showGerente')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico', 'PersonaController@showTecnico')->middleware('auth');

Route::get('/busquedaTrabajadores/coordinador', 'PersonaController@showCoordinador')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico/mañana', 'PersonaController@showMañana')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico/tarde', 'PersonaController@showTarde')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico/noche', 'PersonaController@showNoche')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico/disponible', 'PersonaController@showDisponible')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico/noDisponible', 'PersonaController@showNodisponible')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico/alava', 'PersonaController@showAlava')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico/guipuzcoa', 'PersonaController@showGuipuzcoa')->middleware('auth');

Route::get('/busquedaTrabajadores/tecnico/vizcaya', 'PersonaController@showVizcaya')->middleware('auth');

Route::get('/buscadorTrabajadores', 'PersonaController@showTrabajadores')->middleware('auth');

Route::get('/cookie/set','CookieController@setCookie');

Route::get('/cookie/get','CookieController@getCookie');

