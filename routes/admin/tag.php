<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 1/24/2018
 * Time: 12:47 AM
 */

Route::group(['prefix' => 'tags', 'as' => 'tag.', 'namespace' => 'Tag\Admin'], function () {

    Route::get('/', 'TagController@index')->name('index')->middleware('permission:read-tag');
    Route::post('items', 'TagController@items')->name('items')->middleware('permission:read-tag');
    Route::get('create', 'TagController@create')->name('create')->middleware('permission:create-tag');
    Route::post('/', 'TagController@store')->name('store')->middleware('permission:create-tag');
    Route::get('{id}', 'TagController@show')->name('show')->middleware('permission:read-tag');
    Route::get('edit/{id}', 'TagController@edit')->name('edit')->middleware('permission:edit-tag');
    Route::put('{id}', 'TagController@update')->name('update')->middleware('permission:edit-tag');
    Route::delete('{id}', 'TagController@destroy')->name('destroy')->middleware('permission:delete-tag');

    Route::group(['prefix' => 'search', 'as' => 'search.', 'namespace' => 'Search'], function () {
        Route::post('/', 'TagSearchController@index')->name('index')->middleware('permission:read-tag');
    });

});