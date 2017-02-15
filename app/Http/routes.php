<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@index');

Route::auth();


Route::resource('almacen/categoria','CategoriaController');

Route::resource('almacen/articulo','ArticuloController');

Route::resource('ventas/cliente','ClienteController');

Route::resource('compras/proveedor','ProveedorController');
Route::resource('compras/ingreso','IngresoController');
Route::resource('ventas/venta','VentaController');
Route::resource('registeruser','RegisterUserController');


Route::get('/pdfproductos', 'ArticuloController@pdfproductos');
Route::get('/pdfIngreso/{id}', 'IngresoController@pdf');
Route::get('/pdfVenta/{id}', 'VentaController@pdf');

Route::get('/help', function(){
	return view('help.index.htm');
});

Route::get('/reportes/product', 'ArticuloController@listarProductos');
Route::get('/reportes/productos', 'ArticuloController@listarReporteProductos');

Route::get('/reportes/compras', 'IngresoController@formListaCompras');
Route::get('/reportes/ventas', 'VentaController@formListaVentas');

Route::get('/reportes/grafica_ventas', 'GraficasController@grafico_ventas');
Route::get('/reportes/grafica_compras', 'GraficasController@grafico_compras');
Route::get('/reportes/grafica_registros_ventas/{anio}/{mes}', 'GraficasController@registros_mes_ventas');
Route::get('/reportes/grafica_registros_compras/{anio}/{mes}', 'GraficasController@registros_mes_compras');