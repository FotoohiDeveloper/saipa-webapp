<?php

use App\Http\Controllers\InformationController;
use App\Http\Controllers\KermanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModiranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SaipaController;
use App\Http\Controllers\UserController;
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

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'show']);
        Route::patch('/', [UserController::class, 'update']);
        Route::prefix('/phone')->group(function () {
            Route::post('/add-phone', [UserController::class, 'sendCode']);
            Route::post('/verify', [UserController::class, 'verifyOtp']);
        });

        Route::middleware('access')->group(function () {
            Route::prefix('information')->group(function () {
                Route::get('/', [InformationController::class, 'show']);
                // Route::post('/', [InformationController::class, 'add']);

                Route::prefix('add')->group(function () {
                    Route::post('/saipa', [InformationController::class, 'addSaipa'])->name('add.saipa');
                    Route::post('/modiran', [InformationController::class, 'addModiran'])->name('add.modiran');
                    Route::post('/bahman', [InformationController::class, 'addBahman'])->name('add.bahman');
                });

                Route::delete('/', [InformationController::class, 'delete']);
                // Route::patch('/', [InformationController::class, 'update']);
            });

            Route::prefix('request')->group(function () {
                Route::post('/saipa', [SaipaController::class, 'sendRequest'])->name('request.saipa');
                Route::post('/modiran-khodro', [ModiranController::class, 'sendRequest'])->name('request.modiran');
                Route::post('/kerman-motor', [KermanController::class, 'sendRequest'])->name('request.kerman');
            });
        });
    });
});
