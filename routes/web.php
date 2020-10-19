<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicios');
Route::get('/home/{id}', 'HomeController@show');


Route::get('/acerca', 'ControladorPagina@acerca')->name('acercas');

Route::get('/contacto', 'ControladorPagina@contacto')->name('contactos');
Route::post('/contacto', 'HomeController@store')->name('enviarComentarios');

Route::get('/admin', 'ControladorPagina@administrador')->name('admin');

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
Route::get('/padrino', 'PadrinoController@index')->name('padrinos');
Route::post('/padrino', 'PadrinoController@store');

//apadrinados
Route::get('/apadrinar', 'PadrinoController@apadrinar')->name('apdrinar');


//Route::resource('post', 'PostsController')->middleware('auth');


