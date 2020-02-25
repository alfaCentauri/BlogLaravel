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
 * Prefijo al grupo de rutas de administración de la aplicación.
 */
Route::prefix('admin')->group(function () {
    /**
     * Rutas para el CRUD.
     */
    Route::resource('users','UsersController');
    /**
     * Borrando usuario con metodo get
     */
    Route::get('/users/{id}/destroy', 'UsersController@destroy')
        ->name('users.destroy')->where('id','[0-9]+');
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
    Route::get('/view', 'ArticleController@view')->name('articlesList');
    /**
     * Muestra un articulo indicado por su indice.
    */
    Route::get('/show/{id?}', 'ArticleController@show')->name('articleShow')->where('id','[0-9]+');
    /**
     * Se dirije a la vista del formulario
     */
    Route::get('/create', 'ArticleController@create')->name('articleCreate');
    /**
     * Guarda en la app el formulario
     */
    Route::post('/store', 'ArticleController@store')->name('articleStore');
    //
    Route::put('/update/{id?}', 'ArticleController@update')->name('articleUpdate')->where('id','[0-9]+');
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
