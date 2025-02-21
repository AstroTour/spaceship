<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationsController;
use App\Http\Middleware\SuperAdmin;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\FlightsController;
use \App\Http\Controllers\ScheduleController;
use \App\Http\Controllers\AdminController;
use \App\Http\Middleware\Admin;
use \App\Http\Controllers\SpaceshipController;

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

require __DIR__.'/auth.php';



Route::middleware(['auth:sanctum', Admin::class])->group(function () {

});



Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/user-search', [AdminController::class, 'userSearch'])->name('admin.user.search');
Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('/schedules-list', [ScheduleController::class, 'index'])->name('schedules.index');
Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
Route::post('/cleanup-schedules', [ScheduleController::class, 'cleanup'])->name('schedules.cleanup');
Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations.index');
Route::get('/spaceships-management', [SpaceshipController::class, 'index']);
Route::delete('users/{id}', [AdminController::class, 'destroy'])->name('users.delete-user');
Route::post('/users/{id}/update-role', [AdminController::class, 'updateRole'])->name('users.update-role');




Route::middleware(['auth:sanctum', SuperAdmin::class])->group(function () {

});

