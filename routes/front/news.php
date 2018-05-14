<?php

Route::group(['prefix' => 'interviews', 'as' => 'news.', 'namespace' => 'News\Front'], function () {

    Route::get('/', 'NewsController@index')->name('index');
    Route::get('{id}/{title?}', 'NewsController@show')->name('show');

});