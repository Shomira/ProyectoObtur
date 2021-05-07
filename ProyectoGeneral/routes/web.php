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


Route::get('/', 'App\Http\Controllers\WelcomeController@index');
Route::post('/', 'App\Http\Controllers\WelcomeController@all');
Route::post('/barra', 'App\Http\Controllers\WelcomeController@barra');

Auth::routes();


Route::get('/obtur', function () {
    return view('obtur');
});


Route::get('/datosEstadisticos', 'App\Http\Controllers\DatosEstadisticosController@index');
Route::post('/datosEstadisticos', 'App\Http\Controllers\DatosEstadisticosController@mostrar');
Route::post('/datosEstadisticos/all', 'App\Http\Controllers\DatosEstadisticosController@all');

Route::get('/informacionTuristica', function () {
    return view('informacionTuristica');
});

Route::post('import-excel', 'App\Http\Controllers\ImportExcel\ImportExcelController@import');
     

Route::group(['prefix'=>'home', 'as'=>'home'], function(){
    Route::get('/comparativas', 'App\Http\Controllers\ComparativasController@index');
    Route::post('/comparativas/all', 'App\Http\Controllers\ComparativasController@all');
    Route::post('/comparativas/dias', 'App\Http\Controllers\ComparativasController@dias');
    Route::get('/resumenMensual', 'App\Http\Controllers\ResumenMensualController@index');
    Route::post('/resumenMensual', 'App\Http\Controllers\ResumenMensualController@all');
    Route::get('/analisisDeNegocio', 'App\Http\Controllers\AnalisisDeNegocioController@index');
    Route::post('/analisisDeNegocio', 'App\Http\Controllers\AnalisisDeNegocioController@all');
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::get('/homeEstablecimiento', 'App\Http\Controllers\HomeEstablecimientoController@index'); 
    Route::get('/gestionUsuarios', 'App\Http\Controllers\UsersController@index');
    Route::resource('/gestionUsuarios', 'App\Http\Controllers\UsersController');
    Route::post('/gestionUsuarios/edit', 'App\Http\Controllers\UsersController@editarUsuario');
    Route::get('/visualizarRegistros', 'App\Http\Controllers\VisualizarRegistrosController@index');
    Route::post('/visualizarRegistros', 'App\Http\Controllers\VisualizarRegistrosController@mostrar');
    Route::get('/archivos', 'App\Http\Controllers\ImportExcel\ImportExcelController@index');
    Route::get('/visualizarArchivosCargados', 'App\Http\Controllers\VisualizarArchivosCargadosController@index');
    Route::delete('/visualizarArchivosCargados/{file}', 'App\Http\Controllers\VisualizarArchivosCargadosController@destroy');
    Route::get('/visualizarArchivos', 'App\Http\Controllers\VisualizarArchivosController@index');
    Route::post('/visualizarArchivos', 'App\Http\Controllers\VisualizarArchivosController@mostrar');
    Route::get('/visualizarEstablecimientos', 'App\Http\Controllers\VisualizarEstablecimientosController@index');
    
    
    
  
});