<?php

use App\Events\SendMessage;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'admin'])->get('/admin', function () {
    return view('admin');
})->name('admin');


Route::middleware('auth:sanctum')->get('/user', function () {
    return view('admin');
})->name('user');



Route::get('/pusher/index', function () {
    return view('messages');
});


Route::get('/pusher/form', function () {
    return view('form');
});


Route::post('/pusher/send', function () {
    $message = request()->message;
    event(new SendMessage($message));
})->name('sendMessage');