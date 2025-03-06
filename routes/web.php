<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PermissionController;


Route::get('/', function () {
    return view('home');
})->name('home');

// user management
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

// user authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticateUser'])->name('authenticateUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Job posting section
