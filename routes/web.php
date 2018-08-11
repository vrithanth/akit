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
Route::get('/update', 'HomeController@update')->name('update');
Route::post('/update', 'HomeController@update')->name('update');
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/create', 'HomeController@create')->name('create');
Route::get('/delete', 'HomeController@delete')->name('delete');

Route::match(['get', 'post'], 'register', function(){
    return redirect('/login');
});
Route::get('/isadmin', 'HomeController@admin_page')->name('admin')->middleware('auth','admin');
