<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::prefix('admin')->as('admin.')->middleware(['auth:sanctum', 'admin'])->group(function () {
        Route::resource('users', 'Admin\UserController')->only([
            'index', 'store', 'edit', 'create', 'update', 'destroy'
        ]);
    });

    Route::prefix('admin')->as('admin.')->middleware(['auth:sanctum'])->group(function () {
        Route::get('users/login_user', 'Admin\UserController@login_user');
        Route::patch('users/edit_profile', 'Admin\UserController@edit_profile');
    });
});
