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

Route::get('/', 'FinanceController@index');
Route::get('/api/getbill', 'FinanceController@getbill');

Route::get('/api/waste', 'FinanceController@show');
Route::post('/api/waste', 'FinanceController@store');
Route::delete('/api/wastedelete', 'FinanceController@delete');
Route::post('/api/addbill', 'FinanceController@addbill');
