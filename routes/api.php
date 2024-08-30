<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
});


Route::group(['prefix' => 'user'], function () {
    Route::post('', [UserController::class, 'create']);
    Route::get('', [UserController::class, 'all']);
    Route::get('/{id}', [UserController::class, 'find']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'delete']);
});

Route::group(["middleware" => ["jwt.verify"]], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::delete('logout', [AuthController::class, 'logout']);
    });

    Route::group(['prefix' => 'task'], function () {
        Route::post('', [TaskController::class, 'create']);
        Route::get('', [TaskController::class, 'all']);
        Route::get('/{id}', [TaskController::class, 'find']);
        Route::put('/{id}', [TaskController::class, 'update']);
        Route::delete('/{id}', [TaskController::class, 'delete']);
    });
});
