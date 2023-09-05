<?php

use App\Http\Controllers\Api\AlumnoController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']],function(){
        //Rutas Auth
        Route::get('user-profile',[UserController::class,'userProfile']);
        Route::get('logout',[UserController::class,'logout']);

        //Rutas Alumnos
        Route::post('create-alumno',[AlumnoController::class,'createAlumno']);
        Route::get('list-alumno',[AlumnoController::class,'listAlumno']);
        Route::get('show-alumno/{id}',[AlumnoController::class,'showAlumno']);
        Route::put('update-alumno/{id}',[AlumnoController::class,'updateAlumno']);
        Route::delete('delete-alumno/{id}',[AlumnoController::class,'deleteAlumno']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
