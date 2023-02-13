<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;


//Auth Calls

Route::post('register', [AuthControllers::class, 'register']);
Route::post('login', [AuthControllers::class, 'login']);

//User calls

Route::get("/users", [UsersController::class, "getAllUsers"]);
