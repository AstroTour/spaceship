<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ScheduleController;
use \App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', [UserController::class, 'profileView']);
});

Route::post('/login', [\App\Http\Controllers\Api\ApiLoginController::class, 'login']);




// A menetrendek lekérdezése
Route::get('/public-schedules', [ScheduleController::class, 'publicSchedules']);

// A menetrendek csökkenő sorrendje
Route::get('/schedules/descending', [ScheduleController::class, 'schedulesDescending']);

//A menetrendek növekvő sorrendje
Route::get('/schedules/ascending', [ScheduleController::class, 'schedulesAscending']);


