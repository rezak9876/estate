<?php
use Modules\FrontEndLog\Http\Controllers\FrontEndLogController;

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

Route::post('/frontendlog', [FrontEndLogController::class, 'index']);
