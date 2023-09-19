<?php

use App\Http\Controllers\Api\{AlumnoController, UserController};
//use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']],function(){
        //Rutas Auth
        Route::get('user-profile',[UserController::class,'userProfile'])->middleware(['role']);
        Route::put('user-update/{id}',[UserController::class,'userUpdate'])->middleware(['role']);
        Route::get('logout',[UserController::class,'logout']);
        Route::get('userlist',[UserController::class,'userList'])->middleware(['role']);

        //Rutas Alumnos
        Route::post('create-alumno',[AlumnoController::class,'createAlumno'])->middleware(['administrador']);
        Route::get('list-alumno',[AlumnoController::class,'listAlumno'])->middleware(['administrador']);
        Route::get('show-alumno/{id}',[AlumnoController::class,'showAlumno'])->middleware(['administrador']);
        Route::put('update-alumno/{id}',[AlumnoController::class,'updateAlumno'])->middleware(['administrador']);
        Route::delete('delete-alumno/{id}',[AlumnoController::class,'deleteAlumno'])->middleware(['administrador']);
});



/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
