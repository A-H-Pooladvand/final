<?php

Route::group(['prefix' => 'upcoming', 'as' => 'event.', 'namespace' => 'Event\Admin'], function () {

    Route::get('/', 'EventController@index')->name('index')->middleware('permission:read-event');
    Route::post('items', 'EventController@items')->name('items')->middleware('permission:read-event');
    Route::get('create', 'EventController@create')->name('create')->middleware('permission:create-event');
    Route::post('/', 'EventController@store')->name('store')->middleware('permission:create-event');
    Route::get('{id}', 'EventController@show')->name('show')->middleware('permission:read-event');
    Route::get('edit/{id}', 'EventController@edit')->name('edit')->middleware('permission:edit-event');
    Route::put('{id}', 'EventController@update')->name('update')->middleware('permission:edit-event');
    Route::delete('{id}', 'EventController@destroy')->name('destroy')->middleware('permission:delete-event');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:read-event|edit-event');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:read-event|edit-event');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:read-event|edit-event');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:read-event|edit-event');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:read-event|edit-event');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:read-event|edit-event');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:read-event|edit-event');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:read-event|edit-event');

    });

});