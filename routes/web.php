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
    return redirect('login');
});

\Illuminate\Support\Facades\Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/invitation/{token}', 'Auth\InvitationController@create')->name('invitation.create');
Route::post('/invitation/{token}', 'Auth\InvitationController@store')->name('invitation.store');

Route::get('/family/{family}/edit', 'Family\FamilyController@edit')->name('family.edit');
Route::get('/family/{family}', 'Family\FamilyController@show')->name('family.show');

Route::get('/users/create', 'Users\InvitationController@create')->name('user.create');
Route::post('/users', 'Users\InvitationController@store')->name('user.store');

Route::get('/stores', 'Store\StoreController@index')->name('store.index');
Route::post('/stores', 'Store\StoreController@store')->name('store.store');
Route::get('/stores/create', 'Store\StoreController@create')->name('store.create');
Route::get('/stores/{store}', 'Store\StoreController@show')->name('store.show');
Route::post('/stores/{store}', 'Store\StoreController@update')->name('store.update');
Route::get('/stores/{store}/edit', 'Store\StoreController@edit')->name('store.edit');

Route::get('/categories', 'Category\CategoryController@index')->name('category.index');
Route::post('/categories', 'Category\CategoryController@store')->name('category.store');
Route::get('/categories/create', 'Category\CategoryController@create')->name('category.create');
Route::get('/categories/{category}', 'Category\CategoryController@show')->name('category.show');
Route::post('/categories/{category}', 'Category\CategoryController@update')->name('category.update');
Route::get('/categories/{category}/edit', 'Category\CategoryController@edit')->name('category.edit');

Route::get('/transactions', 'Transaction\TransactionController@index')->name('transaction.index');
Route::post('/transactions', 'Transaction\TransactionController@store')->name('transaction.store');
Route::get('/transactions/create', 'Transaction\TransactionController@create')->name('transaction.create');
Route::get('/transactions/{transaction}', 'Transaction\TransactionController@show')->name('transaction.show');
Route::post('/transactions/{transaction}', 'Transaction\TransactionController@update')->name('transaction.update');
Route::get('/transactions/{transaction}/edit', 'Transaction\TransactionController@edit')->name('transaction.edit');
