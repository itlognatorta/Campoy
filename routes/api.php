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

Route::get('/users', [UserController::class, 'index']);          // List all users
Route::get('/users/{id}', [UserController::class, 'show']);      // Get user by ID
Route::post('/users', [UserController::class, 'store']);         // Create new user
Route::put('/users/{id}', [UserController::class, 'update']);    // Update user
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/role-statuses', [RoleStatusController::class, 'index']);
Route::get('/role-statuses/{id}', [RoleStatusController::class, 'show']);
Route::post('/role-statuses', [RoleStatusController::class, 'store']);
Route::put('/role-statuses/{id}', [RoleStatusController::class, 'update']);
Route::delete('/role-statuses/{id}', [RoleStatusController::class, 'destroy']);

Route::get('/tickets', [TicketController::class, 'index']);
Route::get('/tickets/{id}', [TicketController::class, 'show']);
Route::post('/tickets', [TicketController::class, 'store']);
Route::put('/tickets/{id}', [TicketController::class, 'update']);
Route::delete('/tickets/{id}', [TicketController::class, 'destroy']);


Route::get('/violations', [ViolationController::class, 'index']);
Route::get('/violations/{id}', [ViolationController::class, 'show']);
Route::post('/violations', [ViolationController::class, 'store']);
Route::put('/violations/{id}', [ViolationController::class, 'update']);
Route::delete('/violations/{id}', [ViolationController::class, 'destroy']);

Route::get('/violation-statuses', [ViolationStatusController::class, 'index']);
Route::get('/violation-statuses/{id}', [ViolationStatusController::class, 'show']);
Route::post('/violation-statuses', [ViolationStatusController::class, 'store']);
Route::put('/violation-statuses/{id}', [ViolationStatusController::class, 'update']);
Route::delete('/violation-statuses/{id}', [ViolationStatusController::class, 'destroy']);

Route::get('/violators', [ViolatorController::class, 'index']);
Route::get('/violators/{id}', [ViolatorController::class, 'show']);
Route::post('/violators', [ViolatorController::class, 'store']);
Route::put('/violators/{id}', [ViolatorController::class, 'update']);
Route::delete('/violators/{id}', [ViolatorController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/logout', [AuthenticationController::class, 'logout']);

Route::post('/login', [AuthenticationController::class, 'login']);