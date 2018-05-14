<?php

Route::group(['prefix' => 'about', 'as' => 'about.', 'namespace' => 'About\Front'], function () {

    Route::get('/', 'AboutController@show')->name('show');

});