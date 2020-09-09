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
Route::get('/stores', 'Store\Storecontroller@index')->name('store.index');
Route::post('/stores', 'Store\Storecontroller@store')->name('store.store');
Route::get('/stores/create', 'Store\Storecontroller@create')->name('store.create');
Route::get('/stores/{store}', 'Store\Storecontroller@show')->name('store.show');
Route::post('/stores/{store}', 'Store\Storecontroller@update')->name('store.update');
Route::get('/stores/{store}/edit', 'Store\Storecontroller@edit')->name('store.edit');
