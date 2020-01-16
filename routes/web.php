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
Route::get('/perfil', function () {
    return view('perfil');
});
Route::get('/login', function (){
    return view('login');
})->name('login');
Route::get('/login/check', function (){
    return view('login.check');
})->name('login');
Route::get('/signup', function (){
    return view('signup');
})->name('signup');

Route::get('/incidencia', function () {
    return view('incidencia');
})->name('incidencia');

Route::get('/anadir', 'incidenciaController@store');

Route::get('/signup/store', function (){
    return view('signup');
})->name('signup.store');
