<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\API\MultimediaController;
use App\Http\Controllers\API\NoticiaController;

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
    Route::put('user/delete/{id}','destroy');
})->middleware('auth:api');

Route::controller(AreaController::class)->group(function(){
    Route::get('areas','index');
    Route::post('areas','store');
    Route::get('areas/{id}','show');
    Route::put('areas/{id}','update');
})->middleware('auth:api');

Route::controller(NoticiaController::class)->group(function(){
    Route::get('noticias','index');
    Route::post('noticia','store');
    Route::get('noticia/{id}','show');
    Route::put('noticia/eliminar/{id}','destroy');
    Route::put('noticia/{id}','update');
    Route::get('noticias/destacadas','noticiasDestacadas');
    Route::get('noticias/area','noticiasArea');
})->middleware('auth:api');

Route::controller(MultimediaController::class)->group(function(){
    Route::get('multimedias','index');
})->middleware('auth:api');