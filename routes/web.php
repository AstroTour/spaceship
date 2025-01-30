<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\FlightsController;
use \App\Http\Controllers\ScheduleController;
use \App\Http\Controllers\AdminController;
use \App\Http\Middleware\Admin;

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

// require __DIR__.'/auth.php';
Route::middleware(['auth:sanctum', Admin::class])
    ->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
        Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
        Route::post('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.update-role');
        Route::get('/schedules-list', [ScheduleController::class, 'index'])->name('schedules.index');
        Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
    });


