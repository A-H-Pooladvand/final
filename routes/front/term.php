<?php

Route::group(['prefix' => 'terms', 'as' => 'term.', 'namespace' => 'Term\Front'], function () {

    Route::get('/', 'TermController@index')->name('index');
    Route::get('{id}/{title?}', 'TermController@show')->name('show');

});