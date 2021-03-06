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
Route::get('language/{language}','LanguageController@index')->name('language');

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


Route::group(['namespace' => 'Event'], function () {
    Route::get('/', 'RegisterEventController@index')->name('index');
    Route::get('/detail/{id}', 'RegisterEventController@detailEvent')->name('event.detail');
    Route::post('/register_event/{id}','RegisterEventController@registerEvent')->name('event.register');
    Route::get('/cancel_event/{id}','RegisterEventController@cancelEvent')->name('event.cancel');
});



Route::group(['prefix'=>'admin', 'middleware' => 'admin.auth'],function (){
    Route::get('/','Admin\AdminController@index')->name('admin.home');

    Route::get('/event','Admin\CreateEventController@index')->name('admin.get.list.event');
    Route::get('/event/create','Admin\CreateEventController@create')->name('admin.get.create.event');
    Route::post('/event/create','Admin\CreateEventController@store');
    Route::get('/event/edit/{id}','Admin\CreateEventController@edit')->name('admin.get.edit.event');
    Route::post('/event/edit/{id}','Admin\CreateEventController@update');
    Route::get('/event/detail/{id}','Admin\CreateEventController@viewEvent')->name('admin.view.event');
    Route::get('/event/detail/registration/{id}','Admin\CreateEventController@detailRegistrationEvent')->name('admin.detail.registration.event');
    Route::get('/event/{action}/{id}','Admin\CreateEventController@action')->name('admin.get.action.event');
    Route::get('/event/cancel','Admin\CreateEventController@cancel_event')->name('cancel_event');


    Route::get('/registration','Admin\ListRegisterEventController@index')->name('admin.get.list.registration');
    Route::get('/registration/{id}','Admin\ListRegisterEventController@showDetailRegistration')->name('admin.detail.registration');


    Route::get('/user','Admin\ManagerUserController@index')->name('admin.get.list.user');
    Route::get('/user/create','Admin\ManagerUserController@create')->name('admin.get.create.user');
    Route::post('user/create', 'Admin\ManagerUserController@store')->name('admin.register');
    Route::get('/user/detail/{id}','Admin\ManagerUserController@detail')->name('admin.detail');
    Route::get('/user/{action}/{id}','Admin\ManagerUserController@action')->name('admin.get.action.user');

});



