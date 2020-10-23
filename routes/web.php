<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicios');
Route::get('/home/{id}', 'HomeController@show');


Route::get('/acerca', 'ControladorPagina@acerca')->name('acercas');

Route::get('/contacto', 'ControladorPagina@contacto')->name('contactos');
Route::post('/contacto', 'HomeController@store')->name('enviarComentarios');

Route::get('/admin', 'ControladorPagina@administrador')->name('admin');

//PDF
Route::get('/reportes', 'ControladorPagina@reporte')->name('reporte');
Route::get('/descargar', 'ControladorPagina@descargar')->name('descargar');

//Route::get('/padrino', 'ControladorPagina@padrinos')->name('padrinos');

Route::get('/post', 'PostsController@index')->name('postIndex');
Route::get('/post/create', 'PostsController@create');
Route::get('/post/{post}', 'PostsController@show');
Route::post('/post', 'PostsController@store')->name('insertarPost');
Route::get('/post/{post}/edit', 'PostsController@edit');
Route::patch('/post/{post}','PostsController@update');
Route::delete('/post/{post}', 'PostsController@destroy');

Route::get('/listado', 'PadrinoController@verPadrino')->name('listadoPadrino');

//Crud para insertar padrinos
Route::get('/padrino', 'PadrinoController@index')->name('padrino');
Route::post('/padrino', 'PadrinoController@store')->name('InsertPadrino');

Route::get('/editar/{id}', 'PadrinoController@editar')->name('editar');
Route::put('/editar/{id}', 'PadrinoController@update')->name('editarPadrinos');
Route::delete('eliminar/{id}', 'PadrinoController@destroy')->name('eliminarPadrino');

//apadrinados
Route::get('/apadrinar', 'PadrinoController@apadrinar')->name('apdrinar');
Route::post('/apadrinar', 'PadrinoController@save')->name('save');


//Route::resource('post', 'PostsController')->middleware('auth');


