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
// 金銭管理登録ページ
Route::get('/money/register', 'Money\MoneyRegisterController@index')->name('money_register');
Route::post('/money/register', 'Money\MoneyRegisterController@registerCheck')->name('money_registerCheck');
Route::post('/money/confirm', 'Money\MoneyRegisterController@confirm')->name('money_confirm');
Route::get('/money/complete', 'Money\MoneyRegisterController@complete')->name('money_complete');
// 金銭管理詳細ページ
Route::get('/money/detail', 'Money\MoneyDetailController@index')->name('money_detail');
// 給料登録ページ
Route::get('/money/salary/register', 'Money\MoneySalaryController@register')->name('money_salary_register');
Route::post('/money/salary/register', 'Money\MoneySalaryController@registerCheck')->name('money_salary_registerCheck');
Route::post('/money/salary/confirm', 'Money\MoneySalaryController@confirm')->name('money_salary_confirm');
Route::get('/money/salary/complete', 'Money\MoneySalaryController@complete')->name('money_salary_complete');
// 貯金額登録ページ
Route::get('/money/savings/register', 'Money\MoneySavingsController@register')->name('money_savings_register');
Route::post('/money/savings/register', 'Money\MoneySavingsController@registerCheck')->name('money_savings_registerCheck');
Route::post('/money/savings/confirm', 'Money\MoneySavingsController@confirm')->name('money_savings_confirm');
Route::get('/money/savings/complete', 'Money\MoneySavingsController@complete')->name('money_savings_complete');