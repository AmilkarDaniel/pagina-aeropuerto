<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AreaController;
use App\Http\Controllers\API\MultimediaController;
use App\Http\Controllers\API\NoticiaController;
use App\Http\Controllers\API\AeropuertoController;
use App\Http\Controllers\API\PersonalController;

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
    Route::get('noticias','aComunicacion');
    Route::get('legal','aLegal');
});

Route::controller(NoticiaController::class)->group(function(){
    //Route::get('noticia','index');
    //solo una url controlarlo en el public con un switch en el request te mandara lo que quiere realizar como delete update create
    //en consultora si o si todas las rutas documentadas y validar protocolos
    //si amnejas front front apache o puerto 800 
    Route::post('noticia_create','store');
    Route::get('noticia/{id}','show');
    Route::put('noticia_delete/{id}','destroy');
    Route::put('noticia_update/{id}','update');
    Route::get('noticias_destacadas','noticiasDestacadas');
    Route::get('noticias_area','noticiasArea');
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

Route::controller(PersonalController::class)->group(function(){
    Route::get('personal','index'); //Visualizar al personal de la empresa
    Route::post('personal_create', 'store'); //registrar personal
    Route::put('personal_update','update'); //actualizar datos del personal
    Route::put('personal_delete','delete'); //dar de baja al personal
});

