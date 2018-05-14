<?php

Route::group(['prefix' => 'categories', 'as' => 'category.', 'namespace' => 'Category\Front'], function () {
    Route::get('{id}/{title?}', 'CategoryController@index')->name('show');
});