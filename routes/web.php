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
Route::get('/helloworldinTest', 'Test\HelloWorldController@say');
Route::get('/helloworldinTestSACE', 'Test\HelloWorldController@sayAndCheckEn');
Route::get('/helloworldinTestSACZ', 'Test\HelloWorldController@sayAndCheckZh');
Route::get('/helloworldinTestSWF', 'Test\HelloWorldController@sayWithFirst');
Route::get('/helloworldsingle', 'HelloWorldController');

Route::get('/dbtest', 'Test\DbTestController');
Route::get('/dbtestSRID', 'Test\DbTestController@selectRowsInDb');
Route::get('/dbtestSRWCID', 'Test\DbTestController@selectRowsWithConditionInDb');
Route::get('/dbtestSORWCID', 'Test\DbTestController@selectOneRowWithConditionInDb');
Route::get('/dbtestIRID', 'Test\DbTestController@insertRowInDb');
Route::get('/dbtestQTCID', 'Test\DbTestController@queryTransactionClosureInDb');
Route::get('/dbtestQTID', 'Test\DbTestController@queryTransactionInDb');
Route::get('/dbtestQGIR', 'Test\DbTestController@queryGetInRedis');
Route::get('/dbtestSIR', 'Test\DbTestController@setInRedis');
Route::get('/dbtestUILIR', 'Test\DbTestController@updateIndexListInRedis');

Route::get('/contact/{id}', 'ContactController@retrieve');
Route::get('/contactUpdateUUID/{id}', 'ContactController@updateUUID');
