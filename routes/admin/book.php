<?php

Route::group(['prefix' => 'books', 'as' => 'book.', 'namespace' => 'Book\Admin'], function () {

    Route::get('/', 'BookController@index')->name('index')->middleware('permission:read-book');
    Route::post('items', 'BookController@items')->name('items')->middleware('permission:read-book');
    Route::get('create', 'BookController@create')->name('create')->middleware('permission:create-book');
    Route::post('/', 'BookController@store')->name('store')->middleware('permission:create-book');
    Route::get('{id}', 'BookController@show')->name('show')->middleware('permission:read-book');
    Route::get('edit/{id}', 'BookController@edit')->name('edit')->middleware('permission:edit-book');
    Route::put('{id}', 'BookController@update')->name('update')->middleware('permission:edit-book');
    Route::delete('{id}', 'BookController@destroy')->name('destroy')->middleware('permission:delete-book');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-book|edit-book');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-book|edit-book');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-book|edit-book');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-book|edit-book');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-book|edit-book');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-book|edit-book');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-book|edit-book');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-book|edit-book');

    });

});