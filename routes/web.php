<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationsController;
use App\Http\Middleware\SuperAdmin;
use Illuminate\Support\Facades\Auth;
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



Route::middleware(['auth', Admin::class])->group(function () {

});

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/user-search', [AdminController::class, 'userSearch'])->name('admin.user.search');
Route::post('/schedules', [AdminController::class, 'adminSchedulesCreate'])->name('schedules.store');
Route::get('/schedules-list', [AdminController::class, 'adminSchedules'])->name('schedules.index');
Route::delete('/schedules/{id}', [AdminController::class, 'adminScheduleDestroy'])->name('schedules.destroy');
Route::post('/cleanup-schedules', [AdminController::class, 'adminSchedulesCleanup'])->name('schedules.cleanup');
Route::get('/reservations', [AdminController::class, 'adminReservations'])->name('reservations.index');
Route::get('/spaceships-management', [AdminController::class, 'adminSpaceships']);
Route::delete('users/{id}', [AdminController::class, 'destroy'])->name('users.delete-user');
Route::post('/users/{id}/update-role', [AdminController::class, 'updateRole'])->name('users.update-role');


Route::get('/auth-debug', function () {
    dd(Auth::check());
});


Route::get('/admin-debug', function () {
    dd(Auth::user());
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', SuperAdmin::class])->group(function () {

});

