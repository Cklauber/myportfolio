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

Route::get('/project/{slug}', 'ProjectController@public')->name('public.project.show');

Route::get('/project/{username}/{slug}', 'ProjectController@publicNonAdmin')->name('public.user.project.show');

Route::prefix('/admin')->middleware('auth')->group(function () {
    //https://laravel.com/docs/5.7/controllers#resource-controllers
    Route::resource('project', 'ProjectController')
            ->names([
                'index' => 'admin.project.index',
                'show' => 'admin.project.show',
            ]);

    Route::resource('page', 'PageController')
            ->names([
                'index' => 'admin.page.index',
            ]);

    Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/{page}', 'PageController@public')->name('page.public');
