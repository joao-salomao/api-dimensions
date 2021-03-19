<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/question', 'QuestionController@index');
Route::post('/question', 'QuestionController@store');
Route::get('/question/{question}', 'QuestionController@show');
Route::put('/question/{question}', 'QuestionController@update');
Route::delete('/question/{question}', 'QuestionController@destroy');

Route::get('/dimension', 'DimensionController@index');
Route::post('/dimension', 'DimensionController@store');
Route::get('/dimension/{dimension}', 'DimensionController@show');
Route::put('/dimension/{dimension}', 'DimensionController@update');
Route::delete('/dimension/{dimension}', 'DimensionController@destroy');
