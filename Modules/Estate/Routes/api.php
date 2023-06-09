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

        Route::post('estates/uploadexcel', 'Admin\EstateController@uploadexcel');
        Route::get('estates/downloadexcel', 'Admin\EstateController@downloadexcel');
    });


    Route::prefix('admin')->as('admin.')->middleware(['auth:sanctum'])->group(function () {
        Route::resource('estates', 'Admin\EstateController')->only([
            'index', 'create', 'store', 'edit', 'update', 'destroy'
        ]);
    });

    Route::get('estate_by_id', 'EstateController@estate_by_id')->name('estate_by_id');
});
