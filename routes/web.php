<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\JobManagementController;


Route::get('/', [JobController::class, 'index']);

// user management
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

// user authentication
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticateUser'])->name('authenticateUser');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Job posting section

Route::get('/jobs', [JobManagementController::class, 'index'])->name('jobs.index'); // List all jobs
Route::get('/jobs/create', [JobManagementController::class, 'create'])->name('jobs.create'); // Show create form
Route::post('/jobs', [JobManagementController::class, 'store'])->name('jobs.store'); // Store job
Route::get('/jobs/{job}', [JobManagementController::class, 'show'])->name('jobs.show'); // Show job details
Route::get('/jobs/{job}/edit', [JobManagementController::class, 'edit'])->name('jobs.edit'); // Show edit form
Route::put('/jobs/{job}', [JobManagementController::class, 'update'])->name('jobs.update'); // Update job
Route::delete('/jobs/{job}', [JobManagementController::class, 'destroy'])->name('jobs.destroy'); // Delete job

