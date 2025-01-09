<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.update-role');
