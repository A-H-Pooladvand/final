<?php

Route::group(['prefix' => 'users', 'as' => 'user.', 'namespace' => 'User\Front'], function () {

    Route::group(['prefix' => 'confirmations', 'as' => 'confirm.', 'namespace' => 'Email'], function () {
//        Route::get('/', 'ConfirmController@requestConfirm')->name('request.confirm');
        Route::get('{id}/{token}', 'ConfirmController@ConfirmUser')->name('confirm');
    });

});