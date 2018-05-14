<?php

Route::group(['prefix' => 'meetings', 'as' => 'meeting.', 'namespace' => 'Meeting\Front'], function () {

    Route::get('/', 'MeetingController@index')->name('index');
    Route::get('{id}/{title?}', 'MeetingController@show')->name('show');

});