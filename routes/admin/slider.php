<?php

Route::group(['prefix' => 'sliders', 'as' => 'slider.', 'namespace' => 'Slider\Admin'], function () {

    Route::get('/', 'SliderController@index')->name('index')->middleware('permission:read-slider');
    Route::post('items', 'SliderController@items')->name('items')->middleware('permission:read-slider');
    Route::get('create', 'SliderController@create')->name('create')->middleware('permission:create-slider');
    Route::post('/', 'SliderController@store')->name('store')->middleware('permission:create-slider');
    Route::get('{id}', 'SliderController@show')->name('show')->middleware('permission:read-slider');
    Route::get('edit/{id}', 'SliderController@edit')->name('edit')->middleware('permission:edit-slider');
    Route::put('{id}', 'SliderController@update')->name('update')->middleware('permission:edit-slider');
    Route::delete('{id}', 'SliderController@destroy')->name('destroy')->middleware('permission:delete-slider');

});