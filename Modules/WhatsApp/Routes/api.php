<?php

use Illuminate\Http\Request;
use Modules\WhatsApp\Entities\Whatsapp;

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

Route::get('/whatsapp', function (Request $request) {
    $wa =  Whatsapp::first();
    return [
        'id' => $wa->id,
        'phone' => $wa->phone,
        'text' => $wa->text
    ];
});

Route::post('/whatsapp', function (Request $request) {
    $id =  $request->input('id');
    $wa =  Whatsapp::where('id',$id)->first();
    return $wa->delete();

});
