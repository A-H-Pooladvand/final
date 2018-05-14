<?php

Route::group(['prefix' => 'tags', 'as' => 'tag.', 'namespace' => 'Tag'], function () {
    Route::get('{title?}', 'TagController@index')->name('index');
});