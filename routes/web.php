<?php

Route::get('/', 'PagesController@root')->name('root');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/email_verify_notice', 'PagesController@emailVerifyNotice')->name('email_verify_notice');

    Route::get('/email_verification/verify', 'EmailVerificationController@verify')->name('email_verification.verify');
    //主动发送验证邮件
    Route::get('/email_verification/send', 'EmailVerificationController@send')->name('email_verification.send');

    Route::group(['middleware' => 'email_verified'], function () {

        Route::get('/user_addresses','UserAddressController@index')->name('user_addresses.index');

        Route::post('/user_addresses','UserAddressController@store')->name('user_addresses.store');

        Route::get('/user_addresses/create','UserAddressController@create')->name('user_addresses.create');
    });
});

