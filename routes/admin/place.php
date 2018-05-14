<?php

Route::group(['prefix' => 'places', 'as' => 'place.', 'namespace' => 'Place\Admin'], function () {

    Route::get('/', 'PlaceController@index')->name('index')->middleware('permission:read-place');
    Route::post('items', 'PlaceController@items')->name('items')->middleware('permission:read-place');
    Route::get('create', 'PlaceController@create')->name('create')->middleware('permission:create-place');
    Route::post('/', 'PlaceController@store')->name('store')->middleware('permission:create-place');
    Route::get('{id}', 'PlaceController@show')->name('show')->middleware('permission:read-place');
    Route::get('edit/{id}', 'PlaceController@edit')->name('edit')->middleware('permission:edit-place');
    Route::put('{id}', 'PlaceController@update')->name('update')->middleware('permission:edit-place');
    Route::delete('{id}', 'PlaceController@destroy')->name('destroy')->middleware('permission:delete-place');

    Route::group(['prefix' => 'ajax', 'as' => 'ajax.', 'namespace' => 'Ajax'], function () {
        Route::get('/', 'AjaxController@index')->name('index');
        Route::post('locations/{id}', 'AjaxController@getLocation')->name('location');
    });

});