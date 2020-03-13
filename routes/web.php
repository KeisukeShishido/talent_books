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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::get('/books/add', 'Admin\BooksController@add');
    Route::post('/books/create', 'Admin\BooksController@create');
    Route::get('/books/index', 'Admin\BooksController@index');
    
    Route::get('/talents/add', 'Admin\TalentsController@add');
    Route::post('/talents/create', 'Admin\TalentsController@create');
    
    Route::get('/authors/add', 'Admin\AuthorsController@add');
    Route::post('/authors/create', 'Admin\AuthorsController@create');
});

