<?php

use Illuminate\Support\Facades\Auth;
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
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['verified', 'admin'])->group(function(){
    Route::view('/', 'admin.mainPage')->name('mainPage');
    Route::resource('tasks', 'TaskController');
    Route::resource('categories', 'CategoryController')->except('show')->scoped(['category' => 'slug']);
    Route::resource('users', 'UserController');
});

//Frontend Routes
Route::namespace('FrontEnd')
        ->name('frontend.')
        ->middleware(['web' ,'auth', 'verified'])
        ->group(function (){
    Route::resource('tasks', 'TaskController')->only(['index', 'show']);
    Route::post('submit-solution/{task}', 'TaskController@checkSolution')->name('submit-solution');
    Route::get('/profile-page', 'ProfilePageController@show')->name('profile-page');
});
Route::view('/', 'frontend.home')->name('frontend.home');
Auth::routes(['verify' => true]);
