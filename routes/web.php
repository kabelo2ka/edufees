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
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('donees', 'DoneeController')->middleware('auth');

Route::resource('donation', 'DonationController')->middleware('auth.donor');







Route::get('test', function() {

   return auth()->user()->doneeProfile()->exists();
});