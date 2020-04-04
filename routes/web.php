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

Route::prefix('elasticsearch')->group(function (){
   Route::get('test',['uses'=>'ClientController@elasticSearchTest']);
   Route::get('data',['uses'=>'ClientController@elasticSearchData']);
});

Route::prefix('duck')->group(function (){
    Route::get('search',['uses'=>'ClientController@duckSearch']);
});