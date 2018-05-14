<?php

Route::group(['prefix' => 'audibles', 'as' => 'audible.', 'namespace' => 'Audible\Admin'], function () {

    Route::get('/', 'AudibleController@index')->name('index')->middleware('permission:read-audible');
    Route::post('items', 'AudibleController@items')->name('items')->middleware('permission:read-audible');
    Route::get('create', 'AudibleController@create')->name('create')->middleware('permission:create-audible');
    Route::post('/', 'AudibleController@store')->name('store')->middleware('permission:create-audible');
    Route::get('{id}', 'AudibleController@show')->name('show')->middleware('permission:read-audible');
    Route::get('edit/{id}', 'AudibleController@edit')->name('edit')->middleware('permission:edit-audible');
    Route::put('{id}', 'AudibleController@update')->name('update')->middleware('permission:edit-audible');
    Route::delete('{id}', 'AudibleController@destroy')->name('destroy')->middleware('permission:delete-audible');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-audible|edit-audible');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-audible|edit-audible');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-audible|edit-audible');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-audible|edit-audible');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-audible|edit-audible');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-audible|edit-audible');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-audible|edit-audible');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-audible|edit-audible');

    });

});