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
//Admin Routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('verified')->group(function(){
    Route::resource('tasks', 'TaskController');
    Route::resource('categories', 'CategoryController')->except('show')->scoped(['category' => 'slug']);
});

//Frontend Routes
Route::namespace('FrontEnd')->group(function (){
    Route::get('/', 'TaskController@index')->name('home');
});
Auth::routes(['verify' => true]);
