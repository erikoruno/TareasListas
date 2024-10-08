<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\KanbanController;

// Ruta para la página de inicio
Route::get('/', function () { 
    return view('auth/login'); 
});

// Ruta para la vista de bienvenida
Route::get('/', function () { 
    return view('welcome'); 
})->name('home');

Auth::routes();

// Ruta para la página de inicio de la aplicación
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'index'])->name('menu.index');

// Rutas Tareas
Route::get('/tareas', [TareasController::class, 'index'])->name('tasks.index');
Route::get('/tareas/create', [TareasController::class, 'create'])->name('tasks.create');
Route::get('/tareas/{tarea}/edit', [TareasController::class, 'edit'])->name('tasks.edit');
Route::post('/tareas', [TareasController::class, 'sendData'])->name('tasks.store');
Route::put('/tareas/{tarea}', [TareasController::class, 'update'])->name('tasks.update');
Route::delete('/tareas/{tarea}', [TareasController::class, 'destroy'])->name('tasks.destroy');

// Rutas Kanban
Route::get('/kanban', [TareasController::class, 'kanban'])->name('kanban.index');


//Rutas calendario
Route::get('/calendario', [TareasController::class, 'calendario'])->name('calendario');

