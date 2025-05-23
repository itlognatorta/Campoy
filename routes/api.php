<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleStatusController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ViolationStatusController;
use App\Http\Controllers\ViolatorController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthenticationController::class, 'register']);

Route::resource('users', UserController::class);
Route::resource('role-statuses', RoleStatusController::class);
Route::resource('tickets', TicketController::class);
Route::resource('violations', ViolationController::class);
Route::resource('violation-statuses', ViolationStatusController::class);
Route::resource('violators', ViolatorController::class);
