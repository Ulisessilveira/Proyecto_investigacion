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

Route::get('/profile',function(){
    return view('welcome');
});

Route::group(['prefix'=>'home','as'=>'home'],function(){
    Route::get('/',function () { return view('home'); });
});

Route::group(['prefix'=>'admin','as'=>'admin'],function(){
    Route::get('/', 'AdminController@index');
    Route::get('/usuarios', 'UserController@index');
    Route::get('/perfil', 'PerfilController@index');
   

    Route::post('/usuarios/edit', 'UserController@editarUsuario');
    Route::resource('usuarios', 'UserController');
});

Route::group(['prefix'=>'users','as'=>'users'],function(){
    Route::get('/alumnos','InvestigadoresController@alumnos');
    Route::get('/docentes','InvestigadoresController@docentes');
});

Route::group(['prefix'=>'proyectos','as'=>'proyectos'],function(){
    Route::get('/agregar_proyecto',function () { return view('agregar_proyecto'); });
    Route::get('/proyecto_documentacion',function () { return view('proyecto_documentacion'); });
    Route::get('/consultar_proyectos',function () { return view('consultar_proyectos'); });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
