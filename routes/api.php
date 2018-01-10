<?php

use Illuminate\Http\Request;

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

Route::get('lists', 'ListController@index');

Route::get('lists/{id}', 'ListController@show')->where('id', '[A-Za-z0-9]+');

Route::patch('lists/{id}', 'ListController@update')->where('id', '[A-Za-z0-9]+');

Route::post('lists', 'ListController@save');

Route::delete('lists/{id}', 'ListController@delete')->where('id', '[A-Za-z0-9]+');


Route::get('contacts/{id}', 'ContactController@index')->where('id', '[A-Za-z0-9]+');

Route::patch('contacts/{id}/{hash}', 'ContactController@update')->where(['id' => '[A-Za-z0-9]+', 'hash' => '[A-Za-z0-9]+']);

Route::post('contacts/{id}', 'ContactController@save')->where('id', '[A-Za-z0-9]+');

Route::delete('contacts/{id}/{hash}', 'ContactController@delete')->where(['id' => '[A-Za-z0-9]+', 'hash' => '[A-Za-z0-9]+']);
