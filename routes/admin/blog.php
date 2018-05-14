<?php

Route::group(['prefix' => 'blogs', 'as' => 'blog.', 'namespace' => 'Blog\Admin'], function () {

    Route::get('/', 'BlogController@index')->name('index')->middleware('permission:read-blog');
    Route::post('items', 'BlogController@items')->name('items')->middleware('permission:read-blog');
    Route::get('create', 'BlogController@create')->name('create')->middleware('permission:create-blog');
    Route::post('/', 'BlogController@store')->name('store')->middleware('permission:create-blog');
    Route::get('{id}', 'BlogController@show')->name('show')->middleware('permission:read-blog');
    Route::get('edit/{id}', 'BlogController@edit')->name('edit')->middleware('permission:edit-blog');
    Route::put('{id}', 'BlogController@update')->name('update')->middleware('permission:edit-blog');
    Route::delete('{id}', 'BlogController@destroy')->name('destroy')->middleware('permission:delete-blog');

});