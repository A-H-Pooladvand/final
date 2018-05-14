<?php

Route::group(['prefix' => 'meetings', 'as' => 'meeting.', 'namespace' => 'Meeting\Admin'], function () {

    Route::get('/', 'MeetingController@index')->name('index')->middleware('permission:read-term');
    Route::post('items', 'MeetingController@items')->name('items')->middleware('permission:read-term');
    Route::get('create', 'MeetingController@create')->name('create')->middleware('permission:create-term');
    Route::post('/', 'MeetingController@store')->name('store')->middleware('permission:create-term');
    Route::get('{id}', 'MeetingController@show')->name('show')->middleware('permission:read-term');
    Route::get('edit/{id}', 'MeetingController@edit')->name('edit')->middleware('permission:edit-term');
    Route::put('{id}', 'MeetingController@update')->name('update')->middleware('permission:edit-term');
    Route::delete('{id}', 'MeetingController@destroy')->name('destroy')->middleware('permission:delete-term');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-term|edit-term');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-term|edit-term');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-term|edit-term');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-term|edit-term');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-term|edit-term');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-term|edit-term');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-term|edit-term');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-term|edit-term');

    });

});