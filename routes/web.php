<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/profile', 'HomeController@showProfile')->name('profile');
Route::get('/create', 'expense_reportsController@create')->name('create');
Route::post('/create', 'expense_reportsController@store')->name('store');
Route::get('/report/{id}', 'expense_reportsController@read')->name('report');
Route::get('/delete/{id}', 'expense_reportsController@delete')->name('delete');
Route::get('/edit/{id}', 'expense_reportsController@edit')->name('edit');
Route::post('/edit/{id}', 'expense_reportsController@update')->name('update');
Route::get('/createExpense/{id}', 'expense_itemController@create_expense')->name('createExpense');
Route::post('/createExpense/{id}', 'expense_itemController@store_expense')->name('storeExpense');
Route::get('/deleteExpense/{id}/', 'expense_itemController@delete')->name('deleteExpense');
Route::get('/viewExpense/{id}/', 'expense_itemController@viewExpense')->name('viewExpense');
Route::get('/editExpense/{id}', 'expense_itemController@editExpense')->name('editExpense');
Route::post('/editExpense/{id}', 'expense_itemController@updateExpense')->name('updateExpense');