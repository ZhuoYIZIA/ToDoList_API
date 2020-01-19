<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::get('getList', 'TodoListController@show');

Route::post('create', 'TodoListController@create');

Route::patch('edit/{todo_list}', 'TodoListController@edit');

Route::delete('delete/{todo_list}', 'TodoListController@destroy');
