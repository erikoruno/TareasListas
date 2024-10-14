<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta Tareas
Route::get('/tareas', [App\Http\Controllers\TareasController::class, 'index']);
Route::get('/tareas/create', [App\Http\Controllers\TareasController::class, 'create']);
Route::get('/tareas/{tarea}/edit', [App\Http\Controllers\TareasController::class, 'edit']);
Route::post('/tareas', [App\Http\Controllers\TareasController::class, 'sendData']);
Route::put('/tareas/{tarea}', [App\Http\Controllers\TareasController::class, 'update']);
Route::delete('/tareas/{tarea}', [App\Http\Controllers\TareasController::class, 'destroy']);
Route::get('/tareas/hoy', [App\Http\Controllers\TareasController::class, 'tareasHoy'])->name('tareas.hoy');
Route::get('/tareas/proximas', [App\Http\Controllers\TareasController::class, 'tareasProximas'])->name('tareas.proximas');

