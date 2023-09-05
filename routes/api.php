<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| 
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return "tahsin";
});

Route::get('/home', function () {
    $name = request("name");
    return '<h1>TahsinAyman '.$name.'</h1>';
});
Route::post('/message', function() {
    $data = request();
    
    return response()->json(['message' => 'Request completed', 'data' => $data]);
});