<?php

Route::group(['prefix' => 'audibles', 'as' => 'audible.', 'namespace' => 'Audible\Front'], function () {

    Route::get('/', 'AudibleController@index')->name('index');
    Route::get('{id}/{title?}', 'AudibleController@show')->name('show');

});