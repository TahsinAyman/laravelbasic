<?php

use App\Http\Controllers\PersonController;
use App\Http\Controllers\StorageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Person;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 
Route::name("people.")->prefix('/people')->group(function () {
    Route::get("", [PersonController::class, "getAllPerson"])->name("getAllPerson");
    Route::get("/{person}", [PersonController::class, "getPersonById"])->name("getPersonById");
    Route::post("", [PersonController::class, "createPerson"])->name("createPerson");    
    Route::put("/{person}", [PersonController::class, "updatePerson"])->name("updatePerson");
    Route::delete("/{person}", [PersonController::class, "deletePerson"])->name("deletePerson");
});

Route::name("storage.")->prefix("/storage")->group(function () {
    Route::get("/uploads/{filename}", [StorageController::class, "showFile"])->name("showFile");
    Route::post("/upload", [StorageController::class, "uploadFile"])->name("uploadFile");
});