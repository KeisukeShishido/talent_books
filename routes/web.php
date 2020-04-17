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

Route::get('/', 'TopPageController@index');
Route::get('/books', 'BooksController@index');
Route::get('/book', 'BooksController@show');
Route::get('/authors', 'AuthorsController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::get('books', 'Admin\BooksController@index');
    Route::get('books/add', 'Admin\BooksController@add');
    Route::post('books/create', 'Admin\BooksController@create');
    Route::get('books/edit', 'Admin\BooksController@edit');
    Route::post('books/update', 'Admin\BooksController@update');
    Route::delete('books/delete', 'Admin\BooksController@delete');
    
    Route::get('talents', 'Admin\TalentsController@index');
    Route::get('talents/add', 'Admin\TalentsController@add');
    Route::post('talents/create', 'Admin\TalentsController@create');
    Route::get('talents/edit', 'Admin\TalentsController@edit');
    Route::post('talents/update', 'Admin\TalentsController@update');
    Route::delete('talents/delete', 'Admin\TalentsController@delete');
    
    Route::get('authors', 'Admin\AuthorsController@index');
    Route::get('authors/add', 'Admin\AuthorsController@add');
    Route::post('authors/create', 'Admin\AuthorsController@create');
    Route::get('authors/edit', 'Admin\AuthorsController@edit');
    Route::post('authors/update', 'Admin\AuthorsController@update');
    Route::delete('authors/delete', 'Admin\AuthorsController@delete');
    
    
});

