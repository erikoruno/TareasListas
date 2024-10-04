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


Route::get('/tareas/pdf', [App\Http\Controllers\TareasController::class, 'pdf'])->name('taks.pdf');
//Ruta Tareas
Route::get('/tareas', [App\Http\Controllers\TareasController::class, 'index'])-> name('tasks.index');
Route::get('/tareas/create', [App\Http\Controllers\TareasController::class, 'create']);
Route::get('/tareas/{tarea}/edit', [App\Http\Controllers\TareasController::class, 'edit']);
Route::post('/tareas', [App\Http\Controllers\TareasController::class, 'sendData']);
Route::put('/tareas/{tarea}', [App\Http\Controllers\TareasController::class, 'update']);
Route::delete('/tareas/{tarea}', [App\Http\Controllers\TareasController::class, 'destroy']);

// Ruta para Kanban
Route::get('/metodos/kanban', [App\Http\Controllers\KanbanController::class, 'index'])->name('kanban.index');


