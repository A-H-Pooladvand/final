<?php

Route::group(['prefix' => 'courses', 'as' => 'course.', 'namespace' => 'Course\Admin'], function () {

    Route::get('/', 'CourseController@index')->name('index')->middleware('permission:read-course');
    Route::post('items', 'CourseController@items')->name('items')->middleware('permission:read-course');
    Route::get('create', 'CourseController@create')->name('create')->middleware('permission:create-course');
    Route::post('/', 'CourseController@store')->name('store')->middleware('permission:create-course');
    Route::get('{id}', 'CourseController@show')->name('show')->middleware('permission:read-course');
    Route::get('edit/{id}', 'CourseController@edit')->name('edit')->middleware('permission:edit-course');
    Route::put('{id}', 'CourseController@update')->name('update')->middleware('permission:edit-course');
    Route::delete('{id}', 'CourseController@destroy')->name('destroy')->middleware('permission:delete-course');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-course|edit-course');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-course|edit-course');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-course|edit-course');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-course|edit-course');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-course|edit-course');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-course|edit-course');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-course|edit-course');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-course|edit-course');

    });

});