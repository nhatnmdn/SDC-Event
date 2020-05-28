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

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login.form');
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
    Route::get('/register', 'RegisterController@showRegisterForm')->name('register.form');
    Route::post('register', 'RegisterController@store')->name('register');
    Route::get('/forgot-password', 'ResetPasswordController@showForgotForm')->name('forgot.form');
    Route::post('/forgot-password', 'ResetPasswordController@sendPasswordMail')->name('send.password.mail');
    Route::get('/password-reset', 'ResetPasswordController@passwordResetForm')->name('password.reset.form');
    Route::post('/password-reset', 'ResetPasswordController@passwordReset')->name('password.reset');
});

Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'UserController@index')->name('index');
});
