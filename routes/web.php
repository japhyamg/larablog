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

// Auth::routes();
Auth::routes(['register'=>false]);

Route::get('/', 'PagesController@index')->name('index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/post/{slug}', 'PagesController@show');


Route::resource('posts', 'PostController')->middleware('can:manage-posts');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController',['except'=>'show']);
});
