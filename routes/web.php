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
})->name('home');
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
    Route::get('/view', 'ArticleController@view')->name('articlesList');
    //
    Route::get('/show/{id?}', 'ArticleController@show')->name('articleShow')->where('id','[0-9]+');
    //
    Route::get('/create', 'ArticleController@create')->name('articleCreate');
    //
    Route::get('/update/{id?}', 'ArticleController@update')->name('articleUpdate')->where('id','[0-9]+');
    //
    Route::get('/delete/{id}', function ($id)  {
        return 'Borrado de articulos.';
    })->name('articleDelete')->where('id','[0-9]+');
});
/**
 * Redireccionamiento.
 */
Route::get('dashboard', function () {
    return redirect('home/dashboard');
});
