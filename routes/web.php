<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PermissionController;


Route::get('/', function () {
    $jobs = Job::latest()->paginate(6);
    return view('home', compact('jobs'));
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

Route::get('/jobs',[JobController::class,'index']);
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index'); // List all jobs
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create'); // Show create form
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store'); // Store job
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show'); // Show job details
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit'); // Show edit form
Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update'); // Update job
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy'); // Delete job

