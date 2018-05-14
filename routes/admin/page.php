<?php

Route::group(['prefix' => 'pages', 'as' => 'page.', 'namespace' => 'Page\Admin'], function () {

    Route::get('/', 'PageController@index')->name('index')->middleware('permission:read-page');
    Route::post('items', 'PageController@items')->name('items')->middleware('permission:read-page');
    Route::get('create', 'PageController@create')->name('create')->middleware('permission:create-page');
    Route::post('/', 'PageController@store')->name('store')->middleware('permission:create-page');
    Route::get('{id}', 'PageController@show')->name('show')->middleware('permission:read-page');
    Route::get('edit/{id}', 'PageController@edit')->name('edit')->middleware('permission:edit-page');
    Route::put('{id}', 'PageController@update')->name('update')->middleware('permission:edit-page');
    Route::delete('{id}', 'PageController@destroy')->name('destroy')->middleware('permission:delete-page');

});