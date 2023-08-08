<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::middleware(['auth', 'role:' . User::ROLE_USER])->group(function () {
    Route::get('/dashboardu', function () {
        return view('dashboardu');
    });
});

Route::get('/notFound', function () {
    return view('notFound');
});
