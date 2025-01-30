<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\FlightsController;
use \App\Http\Controllers\ScheduleController;
use \App\Http\Controllers\AdminController;
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

Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);
});

// require __DIR__.'/auth.php';



Route::get('/admin', [AdminController::class, 'index']);
Route::post('/users/{id}/update-role', [AdminController::class, 'updateRole'])->name('users.update-role');
Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.delete-user');

Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
Route::get('/schedules-list', [ScheduleController::class, 'index'])->name('schedules.index');
Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

// A felhasználó lekérése a foglalásaikkal
Route::get('/admin/users-reservations', [AdminController::class, 'usersWithReservations'])->name('admin.users.reservations');

// Az űrhajók lekérése a hozzájuk tartozó ülésekkel
Route::get('/admin/spaceshipswithseats', [SpaceshipController::class, 'spaceshipsWithSeats'])->name('admin.spaceships.with.seats');

// A járatok lekérése a hozzájuk tartozó menetrendekkel
Route::get('/admin/flights-schedules', [FlightsController::class, 'flightsWithSchedules'])->name('flights.schedules');

