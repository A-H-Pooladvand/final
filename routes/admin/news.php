<?php

Route::group(['prefix' => 'interviews', 'as' => 'news.', 'namespace' => 'News\Admin'], function () {

    Route::get('/', 'NewsController@index')->name('index')->middleware('permission:read-news');
    Route::post('items', 'NewsController@items')->name('items')->middleware('permission:read-news');
    Route::get('create', 'NewsController@create')->name('create')->middleware('permission:create-news');
    Route::post('/', 'NewsController@store')->name('store')->middleware('permission:create-news');
    Route::get('{id}', 'NewsController@show')->name('show')->middleware('permission:read-news');
    Route::get('edit/{id}', 'NewsController@edit')->name('edit')->middleware('permission:edit-news');
    Route::put('{id}', 'NewsController@update')->name('update')->middleware('permission:edit-news');
    Route::delete('{id}', 'NewsController@destroy')->name('destroy')->middleware('permission:delete-news');

    Route::group(['prefix' => 'categories/index', 'as' => 'category.', 'namespace' => 'Category'], function () {

        Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:create-news|edit-news');
        Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:create-news|edit-news');
        Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-news|edit-news');
        Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-news|edit-news');
        Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:create-news|edit-news');
        Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:create-news|edit-news');
        Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:create-news|edit-news');
        Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:create-news|edit-news');

    });

});