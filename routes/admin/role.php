<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 1/24/2018
 * Time: 12:47 AM
 */

Route::group(['prefix' => 'roles', 'as' => 'role.', 'namespace' => 'User\Admin\Role'], function () {

    Route::get('/', 'RoleController@index')->name('index')->middleware('permission:read-acl');
    Route::post('items', 'RoleController@items')->name('items')->middleware('permission:read-acl');
    Route::get('create', 'RoleController@create')->name('create')->middleware('permission:create-acl');
    Route::post('/', 'RoleController@store')->name('store')->middleware('permission:create-acl');
    Route::get('{id}', 'RoleController@show')->name('show')->middleware('permission:read-acl');
    Route::get('edit/{id}', 'RoleController@edit')->name('edit')->middleware('permission:edit-acl');
    Route::put('{id}', 'RoleController@update')->name('update')->middleware('permission:edit-acl');
    Route::delete('soft/{id}', 'RoleController@softDestroy')->name('soft.destroy')->middleware('permission:delete-acl');
    Route::delete('{id}', 'RoleController@destroy')->name('destroy')->middleware('permission:delete-acl');

});