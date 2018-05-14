<?php

Route::group(['prefix' => 'upcoming', 'as' => 'event.', 'namespace' => 'Event\Front'], function () {

    Route::get('/', 'EventController@index')->name('index');
    Route::get('{id}/{title?}', 'EventController@show')->name('show');

});