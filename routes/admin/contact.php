<?php

Route::group(['prefix' => 'contact-us', 'as' => 'contact.', 'namespace' => 'Contact\Admin'], function () {

    Route::get('/', 'ContactUsController@show')->name('show')->middleware('permission:read-contact');
    Route::get('edit/{id}', 'ContactUsController@edit')->name('edit')->middleware('permission:edit-contact');
    Route::put('{id}', 'ContactUsController@update')->name('update')->middleware('permission:edit-contact');

    Route::group(['prefix' => 'contact', 'as' => 'contacts.'], function () {

        Route::get('/', 'ContactController@index')->name('index')->middleware('permission:read-contact');
        Route::post('items', 'ContactController@items')->name('items')->middleware('permission:read-contact');
        Route::get('{id}', 'ContactController@show')->name('show')->middleware('permission:read-contact');
        Route::delete('{id}', 'ContactController@destroy')->name('destroy')->middleware('permission:delete-contact');

    });

});

