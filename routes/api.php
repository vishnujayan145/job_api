<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\JobApplicationController;
use App\Http\Controllers\User\JobController;
use App\Http\Controllers\User\JobSearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('jobs', JobController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('jobs/{job}/apply', [JobApplicationController::class, 'store']);
    Route::get('jobs/{job}/applications', [JobApplicationController::class, 'index']);

});

Route::get('jobs/search', [JobSearchController::class, 'search']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
