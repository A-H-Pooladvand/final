<?php

function pathHandler($path)
{
    foreach (File::allFiles(__DIR__ . '/' . $path) as $partial) {
        require $partial->getPathname();
    }
}

/** Auth Routes */

Auth::routes();

/** Admin Routes */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'permission:admin-panel'], function () {
    pathHandler('admin');
});

pathHandler('front');
