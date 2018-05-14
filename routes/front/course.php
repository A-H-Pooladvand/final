<?php

Route::group(['prefix' => 'terms/courses', 'as' => 'course.', 'namespace' => 'Course\Front'], function () {
    Route::get('{id}/{id1}/{title?}', 'CourseController@show')->name('show');
});