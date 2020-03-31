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

Route::any('/users', 'UserController@index');
Route::any('/users/sign-up', 'UserController@signUp');
Route::any('/users/sign-in', 'UserController@signIn');
Route::any('/user/login', 'UserController@login');

Route::any('/ads', 'AdController@index');
Route::any('/ads/{take}', 'AdController@paginate')->where('take', '[0-9]+');

Route::get('{path}', function () {
    return view('app');
})->where('path', '(.*)');
