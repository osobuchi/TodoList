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

Route::get('/stillTodo','TodoController@stillList')->name('stTodo');

Route::get('/completeTodo','TodoController@completeList')->name('compTodo');

Route::get('/completeTask','TodoController@complete')->name('complete');

Route::get('/stillTask','TodoController@still')->name('still');

Route::get('/addForm','TodoController@addForm')->name('addform');

Route::post('/addForm','TodoController@add');

Route::get('/editForm','TodoController@editForm')->name('edit');

Route::post('/editForm','TodoController@edit');

Route::post('/delete','TodoController@delete');
