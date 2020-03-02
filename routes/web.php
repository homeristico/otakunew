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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','ArticlesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles','ArticlesController');

Route::post('comentario','ComentarioController@store');

Route::get('articles/create', 'ArticlesController@create')->name('create');

Route::get('/showarticle', 'ArticlesController@showArticle')->name('showarticle');

Route::get('article/{titulo}', 'ArticlesController@destroy')->name('delete');

Route::resource('usuarios','usuariosController');

Route::resource('imagens','imagensController');

Route::resource('videos','VideoController');

Route::get('/{categria?}','ArticlesController@filtro');

Route::post('/','BuscarController@store')->name('buscar');




