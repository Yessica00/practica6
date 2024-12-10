<?php

use App\Http\Controllers\JsonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/periodos',[JsonController::class, 'periodos']);
Route::get('/carreras',[JsonController::class, 'carreras']);
Route::get('/semestres',[JsonController::class, 'semestres']);
Route::get('/deptos',[JsonController::class, 'deptos']);
Route::get('/edificios',[JsonController::class, 'edificios']);
Route::get('/materiasa/{semestre}',[JsonController::class, 'materiasa']);
Route::get('/alumnos',[JsonController::class, 'alumnos']);
Route::post('/insertargrupo', [JsonController::class, 'insertarGrupo']);
Route::post('/insertargrupohorario', [JsonController::class, 'insertarGrupoHorario']);
Route::post('/eliminargrupohorario', [JsonController::class, 'eliminarGrupoHorario']);