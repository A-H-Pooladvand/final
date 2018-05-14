<?php

Route::group(['prefix' => 'places', 'as' => 'place.', 'namespace' => 'Place\Front'], function () {

//    Route::get('/', 'TermController@index')->name('index');
    Route::get('{id}/{title?}', 'PlaceController@show')->name('show');

});