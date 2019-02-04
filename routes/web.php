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
    return view('public.index');
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/portfolio', 'ProjectController@index');
    Route::get('/portfolio/{project}', 'ProjectController@show')->name('admin.portfolio.show');
    Route::post('/portfolio', 'ProjectController@store')->name('portfolio.post');
});
