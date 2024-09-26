<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'auth'
], function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegisterController::class, 'register']);
});

Route::apiResource('person', PersonController::class)
->only(['store', 'update', 'destroy'])->middleware('auth:api');
