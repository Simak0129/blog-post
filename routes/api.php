<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/store', 'App\Http\Controllers\PostsController@store');
Route::put('/update', 'App\Http\Controllers\PostsController@update');
Route::delete('/delete', 'App\Http\Controllers\PostsController@destroy');

//Route::get('/test', 'App\Http\Controllers\PostsController@test');
