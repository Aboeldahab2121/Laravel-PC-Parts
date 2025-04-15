<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('users', UserController::class);
Route::patch('users/{id} ', [UserController::class , 'update']);

Route::apiResource('categories', CategoryController::class);
Route::patch('categories/{id}' , [CategoryController::class , 'update']);

Route::apiResource('items' , ItemController::class);
Route::patch('item/{id}' , [ItemController::class , 'update']);
