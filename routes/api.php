<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\API\MultimediaController;
use App\Http\Controllers\API\NoticiaController;
use App\Http\Controllers\API\AeropuertoController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function(){
    Route::post('login','loginUser');
    Route::get('token','tokenActivo');
});

Route::controller(UserController::class)->group(function(){
    Route::get('user','getUserDetail');
    Route::get('logout','userLogout');
    Route::get('users','index');
    Route::post('users','store');
    Route::get('users/{id}','show');
    Route::put('user/{id}','update');
    Route::put('eliminar/user/{id}','destroy');
})->middleware('auth:api');

Route::controller(AreaController::class)->group(function(){
    Route::get('areas','index');
    Route::post('area','store');
    Route::get('area/{id}','show');
    Route::put('area/{id}','update');
    Route::put('eliminar/area/{id}','destroy');
})->middleware('auth:api');

Route::controller(NoticiaController::class)->group(function(){
    Route::get('noticias','index');
    Route::post('noticia','store');
    Route::get('noticia/{id}','show');
    Route::put('eliminar/noticia/{id}','destroy');
    Route::put('noticia/{id}','update');
    Route::get('noticias/destacadas','noticiasDestacadas');
    Route::get('noticias/area','noticiasArea');
})->middleware('auth:api');

Route::controller(UserController::class)->group(function(){
    Route::get('visitante','tokenVisitante');
});

Route::controller(MultimediaController::class)->group(function(){
    Route::get('multimedias','index');
    //Route::get('multimedia','store');
    Route::post('multimedia','store');
    Route::get('multimedia/{id}','show');
})->middleware('auth:api');

Route::controller(AeropuertoController::class)->group(function(){
    Route::post('aeropuerto','store'); //registrar aeropuerto
    Route::put('eliminar/aeropuerto/{id}','destroy'); //dar de bajaaeropuerto
    Route::put('aeropuerto/{id}','update'); //modificar aeropuerto
});

