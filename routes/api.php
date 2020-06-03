<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register','Api\AuthController@register'); //đăng ký
Route::get('signup/activate/{token}', 'Api\AuthController@signupActivate'); //xác thực tài khoản
Route::post('/login','Api\AuthController@login'); //đăng nhập

Route::group([
    'middleware' => 'api',
], function () {
    Route::post('forgot_password', 'Api\PasswordResetController@forgot_password'); // quên mật khẩu
    Route::get('find/{token}', 'Api\PasswordResetController@find'); //link token
    Route::post('reset', 'Api\PasswordResetController@reset'); // đổi mk mới
});


Route::group(['middleware' => 'auth:api'], function(){
    Route::get('user','Api\AuthController@user'); // hiển thị thông tin người dùng
    Route::get('/logout', 'Api\AuthController@logout'); //đăng xuất

    Route::put('/update_info','Api\ChangeAccountController@update_infomation'); // cập nhật thông tin người dùng
    Route::put('/update_pass','Api\ChangeAccountController@update_password'); // cập nhật mật khẩu người dùng
    Route::post('/UploadAvatar','Api\UploadImageController@update_avatar'); // cập nhật avatar

    Route::post('/register_event/{id}','Api\EventController@regis_event'); // đăng kí sự kiện
    Route::put('/cancel_event/{id}','Api\EventController@cancel_event'); // hủy sự kiện
    Route::get('/history_regis','Api\EventController@history_register_event'); // lịch sử đăng ký sự kiện

    Route::post('/checkin/{id}','Api\CheckinController@checkin'); // checkin
});

Route::prefix('event')->group(function (){
    Route::get('/list_happen','Api\EventController@list_happen'); // danh sách sự kiện đang diễn ra
    Route::get('/list','Api\EventController@list_event'); // danh sách sự kiện sắp diễn ra
    Route::get('/detail/{id}','Api\EventController@detail_event'); // chi tiết sự kiện
});


// Route::post('qr_code','Api\CheckinController@qr_code');
