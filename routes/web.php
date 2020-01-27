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
/**
 * Expresiones regulares para filtar el parametro id.
 */
Route::get('user/{id}', function ($id) {
    return 'Indice: '.$id;
})->where('id', '[0-9]+');
/**
 * Ruta de prueba.
 */
Route::get('/articulo', function () {
    return 'Hola mundo';
});
/**
 * Prefijo a un grupo de rutas de los articulos. Cada ruta tiene un nombre único.
*/
Route::prefix('articles')->group(function () {
    Route::get('/view', function () {
        return 'Lista de articulos.';
    })->name('articlesList');
    //
    Route::get('/show/{id}', function ($id) {
        return 'Detalles del articulo #'.$id;
    })->name('articleShow');
    //
    Route::get('/delete', function () {
        return 'Borrado de articulos.';
    })->name('articleDelete');
});
