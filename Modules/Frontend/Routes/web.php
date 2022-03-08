<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('maintenance')->group(function() {
//    Route::get('/search', 'FrontendController@index')->name('search');
    Route::get('/filter', 'FrontendController@filter')->name('filter');
//    Route::get('/estates/{estate}', 'FrontendController@show')->name('show');
});
