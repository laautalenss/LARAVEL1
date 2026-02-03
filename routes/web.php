<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Datos;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\TareaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/libro', [LibroController::class, 'index'])->name('libro.index');
    Route::get('/libro/create', [LibroController::class, 'create'])->name('libro.create');
    Route::post('/libro/create', [LibroController::class, 'create'])->name('libro.create');

    Route::get('/libro/edit/{i}', [LibroController::class, 'edit'])->name('libro.edit');
    Route::post('/libro/edit', [LibroController::class, 'edit'])->name('libro.edit');

    Route::get('/libro/show/{i}', [LibroController::class, 'show'])->name('libro.show');

    Route::get('/libro/destroy/{i}', [LibroController::class, 'destroy'])->name('libro.destroy');
    Route::post('/libro/destroy', [LibroController::class, 'destroy'])->name('libro.destroy');

    //RUTAS DE LAS VISTAS DE USUARIO
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');

    Route::get('/usuarios/edit/{i}', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::post('/usuarios/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');

    Route::get('/usuarios/show/{i}', [UsuarioController::class, 'show'])->name('usuarios.show');

    Route::get('/usuarios/destroy/{i}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    Route::post('/usuarios/destroy', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

    //RUTAS DE LAS VISTAS DE TAREAS
    Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');

    // Solo profesores y admins pueden crear, editar y eliminar
    Route::middleware(['role:profesor|admin'])->group(function () {
        Route::get('/tareas/create', [TareaController::class, 'create'])->name('tareas.create');
        Route::post('/tareas/create', [TareaController::class, 'create'])->name('tareas.create');

        Route::get('/tareas/edit/{i}', [TareaController::class, 'edit'])->name('tareas.edit');
        Route::post('/tareas/edit', [TareaController::class, 'edit'])->name('tareas.edit');

        Route::get('/tareas/destroy/{i}', [TareaController::class, 'destroy'])->name('tareas.destroy');
        Route::post('/tareas/destroy', [TareaController::class, 'destroy'])->name('tareas.destroy');
    });

    Route::get('/tareas/show/{i}', [TareaController::class, 'show'])->name('tareas.show');
});
