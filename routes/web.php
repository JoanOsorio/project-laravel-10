<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UbicationController;
use App\Http\Controllers\ConsumoApiController;

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grupo de rutas para el rol Admin
Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])->group(function () {
    // Rutas relacionadas con la administración de usuarios
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('/createUser', [UserController::class, 'showUserForm'])->name('createUser');
    Route::post('/createUser', [UserController::class, 'createUser']);
    Route::get('/adminUsers', [UserController::class, 'showAllUsers']);
    Route::get('/editUser/{userId}', [UserController::class, 'editUser'])->name('editUser');
    Route::post('/updateUser', [UserController::class, 'updateUser']);
    Route::delete('/deleteUser/{userId}', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/userLogs', [UserController::class, 'showLogsUsers'])->name('userLogs');

    // Rutas para obtener información de ubicaciones
    Route::get('/obtener-paises', [UbicationController::class, 'obtenerPaises']);
    Route::get('/obtener-departamentos/{pais}/', [UbicationController::class, 'obtenerDepartamentos']);
    Route::get('/obtener-municipios/{departamento}/', [UbicationController::class, 'obtenerMunicipios']);
    
    // Rutas para la API
    Route::get('/user/{userId}/posts', [ConsumoApiController::class, 'showUser']);
    Route::get('/users', [ConsumoApiController::class, 'showAllUsersApi']);
});

// Grupo de rutas para Usuarios
Route::middleware(['auth', 'role:' . User::ROLE_USER])->group(function () {
    Route::get('/dashboardu', function () {
        return view('dashboardu');
    });
});

// Ruta para página no encontrada
Route::get('/notFound', function () {
    return view('notFound');
});
