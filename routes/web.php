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

Route::get('/perfil/{id}', 'PersonaController@show')->name('perfil');

Route::get('/login', function (){
    return view('login');})->name('login');

//Route::get('/login/check', 'UserController@check')->name('login');
Route::get('/signup', function (){
    return view('signup');
})->name('signup');

Route::get('/signup/sendMail', 'UserController@enviarEmailCoordinador')->name('signup.enviarEmail');

Route::get('/index', function (){return view('index');})->name('index');

Route::get('/signup/store', 'UserController@store')->name('signup.store');

Route::get('/incidencia', function () {
    return view('incidencia');
})->name('incidencia');

Route::get('/anadir', 'incidenciaController@store');

Route::get('/signup/store', function (){
    return view('signup');
})->name('signup.store');

