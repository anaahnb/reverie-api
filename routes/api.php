<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DreamsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});

Route::group(['prefix' => '/dreams'], function () {
    Route::get('', [DreamsController::class, 'index']);
    Route::post('', [DreamsController::class, 'store']);
    Route::get('/{id}', [DreamsController::class, 'show']);
    Route::put('/{id}', [DreamsController::class, 'update']);
    Route::delete('/{id}', [DreamsController::class, 'destroy']);
});