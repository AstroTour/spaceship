<?php


use App\Http\Controllers\Api\ApiLoggedInController;
use App\Http\Controllers\PlanetsController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiLoginController::class, 'login']);
Route::post('/register', [ApiRegisterController::class, 'register']);


Route::get('/faq', [FaqsController::class, 'index']);
Route::get('/planet', [PlanetsController::class, 'index']);
Route::get('/spaceship', [SpaceshipController::class, 'index']);


Route::get('/public-schedules', [ScheduleController::class, 'publicSchedules']);
Route::get('/schedules/descending', [ScheduleController::class, 'schedulesDescending']);
Route::get('/schedules/ascending', [ScheduleController::class, 'schedulesAscending']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [UserController::class, 'profileView']);
    Route::patch('/profile-update', [UserController::class, 'update']);
    Route::post('/logout', [ApiLoggedInController::class, 'logout']);
});


Route::middleware(['auth:sanctum', Admin::class])
    ->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
    });
