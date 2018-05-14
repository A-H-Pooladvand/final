<?php

Route::group(['prefix' => 'contact', 'as' => 'contact.', 'namespace' => 'Contact\Front'], function () {

    Route::get('/', 'ContactController@show')->name('show');
    Route::post('/', 'ContactController@feedback')->name('store');

});