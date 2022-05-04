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
    Route::get('/search', 'SearchController@index')->name('search');
    Route::get('/markercluster', 'SearchController@markercluster')->name('markercluster');
});
