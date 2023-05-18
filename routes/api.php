<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Generación de token para inicio de sesion
Route::controller(UserController::class)->group(function(){
    Route::post('login','loginUser');
});


Route::controller(UserController::class)->group(function(){
    //metodo de mostrar informacion de usuario con la sesion iniciada
    Route::get('user','getUserDetail');
    //metodo de cerrar sesion
    Route::get('logout','userLogout');
    //metodo de mostrar todos los usuarios
    Route::get('users','index');
    //metodo registrar nuevo usuario
    Route::post('users','store');
    //metodo mostrar un usuario por su id
    Route::get('users/{id}','show');
    //metodo actualizar informacion de un usuario por su id
    Route::put('users/{id}','update');
})->middleware('auth:api');

