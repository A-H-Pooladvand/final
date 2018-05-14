<?php

Route::group(['prefix' => 'users', 'as' => 'user.', 'namespace' => 'User\Admin'], function () {

    Route::get('/', 'UserController@index')->name('index')->middleware('permission:read-user');
    Route::post('items', 'UserController@items')->name('items')->middleware('permission:read-user');
    Route::get('create', 'UserController@create')->name('create')->middleware('permission:create-user');
    Route::post('/', 'UserController@store')->name('store')->middleware('permission:create-user');
    Route::get('{id}', 'UserController@show')->name('show')->middleware('permission:read-user');
    Route::get('edit/{id}', 'UserController@edit')->name('edit')->middleware('permission:edit-user');
    Route::put('{id}', 'UserController@update')->name('update')->middleware('permission:edit-user');
    Route::delete('soft/{id}', 'UserController@softDestroy')->name('soft.destroy')->middleware('permission:delete-user');
    Route::delete('{id}', 'UserController@destroy')->name('destroy')->middleware('permission:delete-user');

    Route::group(['prefix' => 'permissions', 'as' => 'permission.', 'namespace' => 'Permission'], function () {
        Route::get('edit/{id}', 'PermissionController@edit')->name('edit')->middleware('permission:edit-acl');
        Route::put('{id}', 'PermissionController@update')->name('update')->middleware('permission:edit-acl');
    });

    Route::group(['prefix' => 'positions', 'as' => 'position.', 'namespace' => 'Position'], function () {

        Route::get('/', 'PositionController@index')->name('index')->middleware('permission:read-position');
        Route::post('items', 'PositionController@items')->name('items')->middleware('permission:read-position');
        Route::get('create', 'PositionController@create')->name('create')->middleware('permission:create-position');
        Route::post('/', 'PositionController@store')->name('store')->middleware('permission:create-position');
        Route::get('{id}', 'PositionController@show')->name('show')->middleware('permission:read-position');
        Route::get('edit/{id}', 'PositionController@edit')->name('edit')->middleware('permission:edit-position');
        Route::put('{id}', 'PositionController@update')->name('update')->middleware('permission:edit-position');
        Route::delete('{id}', 'PositionController@destroy')->name('destroy')->middleware('permission:delete-position');

    });

});

