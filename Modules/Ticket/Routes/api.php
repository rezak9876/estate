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
    Route::prefix('admin')->as('admin.')->middleware(['auth:sanctum'])->group(function () {
        Route::resource('tickets', 'Admin\TicketController')->only([
            'index','show', 'create', 'store', 'edit', 'update', 'destroy'
        ]);
    });
});
