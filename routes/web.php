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

// you can access the route setting with URI host_address/hw
Route::get('/hw', function() {
    return 'Hello World';
});

Route::get('/helloworld', 'HelloWorldController@say');
