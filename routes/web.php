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

Route::get('/home', function () {
    return view('home');
});

Route::get('/registro-de-personal', function () {
    return view('registro');
});

Route::get('/home/visualizar', function(){
    return view('visualizar');
});

// Route::get('form', function () {
//     return view('form');
// });

// Route::get('base', function () {
//     return view('layouts/base');
// });

Auth::routes();

Route::get('/registro-de-personal', 'HomeController@registroLaboral')->name('home');

Route::get('municipios/{id}', 'HomeController@getMunicipios')->name('home');

Route::get('parroquias/{id}', 'HomeController@getParroquias')->name('home');

Route::post('/registro-de-personal/nuevo-registro', 'HomeController@registrodepersonal')->name('home');

