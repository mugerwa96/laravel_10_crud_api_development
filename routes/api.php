<?php

use App\Http\Controllers\PropertyController;
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

// ---propoerty/

Route::controller(PropertyController::class)
->prefix('property')
->group(function(){
    Route::get('/','index');
    Route::post('/create','create');
    Route::get('/show/{id}','show');
    Route::get('/delete/{id}','delete');
    Route::post('/update/{id}','update');

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
