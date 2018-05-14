<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 1/24/2018
 * Time: 12:47 AM
 */

Route::group(['prefix' => 'categories', 'as' => 'category.', 'namespace' => 'Category\Admin'], function () {

    Route::get('/', 'CategoryController@index')->name('index')->middleware('permission:read-category');
    Route::post('items', 'CategoryController@items')->name('items')->middleware('permission:read-category');
    Route::get('create', 'CategoryController@create')->name('create')->middleware('permission:create-category');
    Route::post('/', 'CategoryController@store')->name('store')->middleware('permission:create-category');
    Route::get('{id}', 'CategoryController@show')->name('show')->middleware('permission:read-category');
    Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('permission:edit-category');
    Route::put('{id}', 'CategoryController@update')->name('update')->middleware('permission:edit-category');
    Route::delete('{id}', 'CategoryController@destroy')->name('destroy')->middleware('permission:delete-category');

});