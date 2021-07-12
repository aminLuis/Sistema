<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/empleados', 'EmpleadosController@index');
//Route::get('/empleados/create', 'EmpleadosController@create');

Route::resource('empleados', 'EmpleadosController')->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', 'EmpleadosController@index')->name('home');
