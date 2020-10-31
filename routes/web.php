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

Route::get('/promociones', 'PromocionesController@registrar')->name('registrar');
Route::get('/ofertas', 'HomeController@ofertas')->name('ofertas');
Route::post('/solicitar_pedido', 'HomeController@pedidos')->name('pedidos');
Route::get('/atender_pedido','PromocionesController@atender')->name('atender');

Route::post('/promociones', 'PromocionesController@ingresar')->name('ingresar');
Route::get('/verpromociones', 'PromocionesController@listadoPromociones')->name('listadoPromociones');
Route::get('/editarPromociones/{id}', 'PromocionesController@editarPromo')->name('editarPromo');
Route::put('/actualizar_promo/{id}', 'PromocionesController@actualizarPromo')->name('actualizarPromo');
Route::delete('/promo_eliminar/{id}', 'PromocionesController@eliminar')->name('eliminarPromo');
Route::put('/confirmar_venta/{id}', 'PromocionesController@confirmar')->name('vender');
Route::get('/historial_venta', 'PromocionesController@historial')->name('historial');

Route::get('/verMensaje/{id}', 'PromocionesController@verMensaje')->name('verMensaje');
Route::put('/antender_mensajes/{id}', 'PromocionesController@atender_mensaje')->name('atender_mensaje');




Route::get('/admin', 'ControladorPagina@administrador')->name('admin');

//PDF
Route::get('/reportes', 'ControladorPagina@reporte')->name('reporte');
Route::get('/descargar', 'ControladorPagina@descargar')->name('descargar');

Route::get('/export_excel', 'ControladorPagina@excel')->name('vista');
Route::get('/export_pdf', 'ControladorPagina@excel_pdf')->name('vista_pdf');
Route::get('/excel_padrino', 'ControladorPagina@excel_padrino')->name('excel_padrino');
Route::get('/mensaje', 'ControladorPagina@mensaje')->name('mensaje');


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
Route::delete('/eliminar/{id}', 'PadrinoController@destroy')->name('eliminarPadrino');

//apadrinados
Route::get('/apadrinar', 'PadrinoController@apadrinar')->name('apdrinar');
Route::post('/apadrinar', 'PadrinoController@save')->name('save');
Route::get('/apadrinados', 'PadrinoController@lista')->name('lista');
Route::get('/apadrinar_editar/{id}', 'PadrinoController@editar_padrino')->name('editar_padrino');
Route::put('/apadrinado/{id}', 'PadrinoController@actualizar_padrino')->name('actualizar_padrino');
Route::delete('/eliminarApa/{id}', 'PadrinoController@delete')->name('deleteApadrinado');


//Route::resource('post', 'PostsController')->middleware('auth');


