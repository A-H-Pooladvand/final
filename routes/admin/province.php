<?php

Route::group(['prefix' => 'provinces', 'as' => 'province.', 'namespace' => 'Province\Admin'], function () {


    Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {

        Route::get('/', 'ProvinceAjaxController@index')->name('index');
        Route::post('province/city/{id}', 'ProvinceAjaxController@provinceCity')->name('province.city');

    });

});