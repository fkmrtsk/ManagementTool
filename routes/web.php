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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/money/register', 'Money\MoneyRegisterController@index')->name('money_register');
Route::post('/money/register', 'Money\MoneyRegisterController@registerCheck')->name('money_registerCheck');
Route::post('/money/confirm', 'Money\MoneyRegisterController@confirm')->name('money_confirm');
Route::get('/money/complete', 'Money\MoneyRegisterController@complete')->name('money_complete');
Route::get('/money/detail', 'Money\MoneyDetailController@index')->name('money_detail');
