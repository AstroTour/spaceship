<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\FlightsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.update-role');

Route::get('/flights/create', [FlightsController::class, 'create'])->name('flights.create');
Route::post('/flights', [FlightsController::class, 'store'])->name('flights.store');
