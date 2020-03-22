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
Route::get('/', 'HomeController@index')->name('bienvenida');
/**
 * Ruta para el login.
 */
Route::get('admin/auth/login', 'Auth\LoginController@getLogin')->name('login');
/**
 * Ruta para el login con el método post
 */
Route::post('admin/auth/login', 'Auth\LoginController@postLogin')->name('login');
/**
 * Ruta para el logout
 */
Route::get('admin/auth/logout', 'Auth\LoginController@getLogout')->name('logout');
/**
 * Prefijo al grupo de rutas de administración de la aplicación.
 */
Route::prefix('admin')->group(function () {
    /**
     * Rutas para el CRUD del usuario.
     */
    Route::resource('users','UsersController');
    /**
     * Borrando usuario con metodo get
     */
    Route::get('/users/{id}/destroy', 'UsersController@destroy')
        ->name('users.destroy')->where('id','[0-9]+');
    /**
     * Rutas para el CRUD de las categorias.
     */
    Route::resource('categories', 'CategoriesController');
    /**
     * Borrando categoria con metodo get
     */
    Route::get('/categories/{id}/destroy','CategoriesController@destroy')
        ->name('categories.destroy')->where('id','[0-9]+');
    /**
     * Rutas para el CRUD de los tags.
     */
    Route::resource('tags','TagsController');
    /**
     * Borrando un tag con metodo get
     */
    Route::get('/tags/{id}/destroy', 'TagsController@destroy')
        ->name('tags.destroy')->where('id','[0-9]+');
    /**
     * Prefijo a un grupo de rutas de los articulos. Cada ruta tiene un nombre único.
     */
    Route::prefix('articles')->group(function () {
        Route::get('/view', 'ArticleController@view')->name('articlesList');
        /**
         * Muestra un articulo indicado por su indice. Expresiones regulares para filtar el parametro id.
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
        /**
         * Muestra la vista del formulario de edición. Expresiones regulares para filtar el parametro id.
        */
        Route::get('/edit/{id?}', 'ArticleController@edit')->name('articleEdit')->where('id','[0-9]+');
        /**
         * Actualizar un artículo. Expresiones regulares para filtar el parametro id.
        */
        Route::put('/update/{id?}', 'ArticleController@update')->name('articleUpdate')->where('id','[0-9]+');
        /**
         * Borra un artículo. Expresiones regulares para filtar el parametro id.
        */
        Route::get('/delete/{id?}', 'ArticleController@delete')->name('articleDelete')->where('id','[0-9]+');
    });
    /**
     * Ruta para la galeria de las imagenes.
     */
    Route::get('/images','ImagesController@index')->name('images.index');
    /**
     * Ruta para la editar una imagen.
     */
    Route::get('/images/edit/{id?}','ImagesController@edit')->name('images.edit')->where('id','[0-9]+');
    /**
     * Ruta para guardar una imagen actualizada.
     */
    Route::put('/images/update/{id?}','ImagesController@update')->name('images.update')->where('id','[0-9]+');
    /**
     * Borrando una imagen con metodo get. Expresiones regulares para filtar el parametro id.
     */
    Route::get('/images/delete/{id?}', 'ImagesController@destroy')->name('images.destroy')->where('id','[0-9]+');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
