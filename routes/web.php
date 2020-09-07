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

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/family/{family}/edit', 'Family\FamilyController@edit')->name('family.edit');
Route::get('/family/{family}', 'Family\FamilyController@show')->name('family.show');
Route::get('/stores', 'Store\Storecontroller@index')->name('store.index');
Route::get('/stores/create', 'Store\Storecontroller@create')->name('store.create');
Route::get('/stores/{store}', 'Store\Storecontroller@show')->name('store.show');
Route::get('/stores/{store}/edit', 'Store\Storecontroller@edit')->name('store.edit');
