<?php

Route::group(['prefix' => 'search', 'as' => 'search.', 'namespace' => 'Search\Front'], function () {
    Route::get('{params?}', ['uses' => 'SearchController@search', 'as' => 'index'])->where('params', '(.*)');
});