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

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', function () {
    echo 'Hello World!';
});
*/

Route::get('/todo', 'TodoController@index')->name('todo.index');// ルート名の定義を追記
//section12追加内容
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
//section13追加内容
Route::post('/todo', 'TodoController@store')->name('todo.store');
//section16追加内容
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
//section18追加内容
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
//section19追加内容
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
//section21追加内容
Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');