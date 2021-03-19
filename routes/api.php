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
Route::get('/question/{question}', 'QuestionController@show');
Route::post('/question', 'QuestionController@store');
Route::put('/question/{question}', 'QuestionController@update');
Route::delete('/question/{question}', 'QuestionController@destroy');
