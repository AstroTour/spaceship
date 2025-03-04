<?php

use App\Http\Controllers\Api\ApiLoggedInController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\PlanetsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProspectusController;
use App\Http\Controllers\SpaceshipController;
use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ScheduleController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\Api\ApiLoginController;
use \App\Http\Controllers\Api\ApiRegisterController;
use \App\Http\Controllers\FaqsController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\ReservationsController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiLoginController::class, 'login']);
Route::post('/register', [ApiRegisterController::class, 'register']);
Route::get('/faq', [FaqsController::class, 'index']);
Route::get('/planet', [PlanetsController::class, 'index']);
Route::get('/prospectus', [ProspectusController::class, 'index']);
Route::get('/schedule', [FlightsController::class, 'flightsAndSchedules']);
Route::get('/spaceship', [SpaceshipController::class, 'index']);
Route::patch('/profile-update', [UserController::class, 'update']);


Route::get('/public-schedules', [ScheduleController::class, 'publicSchedules']);
Route::get('/schedules/descending', [ScheduleController::class, 'schedulesDescending']);
Route::get('/schedules/ascending', [ScheduleController::class, 'schedulesAscending']);


Route::get('/profile', [UserController::class, 'profileView']);
Route::post('/logout', [ApiLoggedInController::class, 'logout']);
Route::get('/schedules-for-planet', [ReservationsController::class, 'schedulesForPlanet']);
Route::get('/at-window-seat', [ReservationsController::class, 'checkWindowSeatAvailability']);
Route::get('/ticket-type', [ReservationsController::class, 'validateTicketType']);
Route::get('/reservation', [ReservationsController::class, 'store']);


Route::middleware(['auth:sanctum'])->group(function () {
//    Route::get('/profile', [UserController::class, 'profileView']);
//    Route::post('/logout', [ApiLoggedInController::class, 'logout']);
//    Route::post('/profile-update', [UserController::class, 'update']);
//    Route::get('/schedules-by-planet', [ReservationsController::class, 'schedulesForPlanet']);
//    Route::get('/at-window-seat', [ReservationsController::class, 'checkWindowSeatAvailability']);
//    Route::get('/ticket-type', [ReservationsController::class, 'validateTicketType']);
//    Route::post('/user-insert', [ReservationsController::class, 'userDataInsert']);
//    Route::get('/reservation', [ReservationsController::class, 'store']);
});


Route::middleware(['auth:sanctum', Admin::class])
    ->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
    });
