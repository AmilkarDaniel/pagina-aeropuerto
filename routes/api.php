<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AreaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function(){
    Route::post('login','loginUser');
});

Route::controller(UserController::class)->group(function(){
    Route::get('user','getUserDetail');
    Route::get('logout','userLogout');
    Route::get('users','index');
    Route::post('users','store');
    Route::get('users/{id}','show');
    Route::put('users/{id}','update');
})->middleware('auth:api');

Route::controller(AreaController::class)->group(function(){
    Route::get('areas','index');
    Route::post('areas','store');
    Route::get('areas/{id}','show');
    Route::put('areas/{id}','update');
});