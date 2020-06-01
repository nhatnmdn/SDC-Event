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

Route::group(['namespace' => 'User', 'middleware' => 'auth'], function () {
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('change-password', 'UserController@changePasswordUser')->name('edit.password');
    Route::put('/change-password', 'UserController@updatePasswordUser')->name('update.password');
    Route::get('/profile/edit', 'UserController@edit')->name('profile.edit.form');
    Route::put('/profile/update', 'UserController@update')->name('profile.update');
});



/*--------------ADMIN-------------------*/

//Route::prefix('admin')->group(function() {
//    Route::get('/','Admin\AdminController@index')->name('admin.home');
//
//    Route::group(['prefix' => 'event'], function(){
//        Route::get('/','Admin\CreateEventController@index')->name('admin.get.list.event');
//        Route::get('/create','Admin\CreateEventController@create')->name('admin.get.create.event');
//        Route::post('/create','Admin\CreateEventController@store');
//        Route::get('/edit/{id}','Admin\CreateEventController@edit')->name('admin.get.edit.event');
//        Route::post('/edit/{id}','Admin\CreateEventController@update');
//        Route::get('/{action}/{id}','Admin\CreateEventController@action')->name('admin.get.action.event');
//
//    });
//
//
//    Route::group(['prefix' => 'registration'], function(){
//        Route::get('/','Admin\ListRegisterEventController@index')->name('admin.get.list.registration');
//
//    });
//
//    Route::group(['prefix' => 'user'], function(){
//        Route::get('/','Admin\ManagerUserController@index')->name('admin.get.list.user');
//
//    });
//
//    Route::group(['prefix' => 'personnel'], function(){
//        Route::get('/','Admin\ManagerPersonnelController@index')->name('admin.get.list.personnel');
//        Route::get('/create','Admin\ManagerPersonnelController@create')->name('admin.get.create.personnel');
//        Route::get('/edit','Admin\ManagerPersonnelController@edit')->name('admin.get.edit.personnel');
//    });
//
//});

