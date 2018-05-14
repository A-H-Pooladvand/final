<?php

Route::group(['prefix' => 'libraries', 'as' => 'book.', 'namespace' => 'Book\Front'], function () {

    Route::get('/', 'LibraryController@index')->name('index');
    Route::get('{id}/{title?}', 'LibraryController@show')->name('show');

});