<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\UserController;

//Auth Calls

Route::post('register', [AuthControllers::class, 'register']);
Route::post('login', [AuthControllers::class, 'login']);

//User calls

Route::get("/users", [UserController::class, "getAllUsers"]);
