<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CanvasController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\PressRequestController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\UtilitiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;

/**
 * Api
 */
Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/session', [AuthController::class, 'session'])->name('session');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('auth:api')->group(function () {
    Route::name('users.')->prefix('users')->group(function () {
        Route::get('/getUsers', [UsersController::class, 'getUsers'])->name('getUsers');
    });

    Route::name('speciality.')->prefix('speciality')->group(function () {
        Route::get('/get', [SpecialityController::class, 'get'])->name('get');
        Route::post('/created', [SpecialityController::class, 'created'])->name('created');
        Route::post('/setStatus', [SpecialityController::class, 'setStatus'])->name('status');
    });

    Route::name('employees.')->prefix('employees')->group(function () {
        Route::get('/get', [EmployeesController::class, 'get'])->name('get');
        Route::post('/created', [EmployeesController::class, 'created'])->name('created');
        Route::post('/setStatus', [EmployeesController::class, 'setStatus'])->name('status');
    });

    Route::name('articles.')->prefix('articles')->group(function () {
        Route::get('/get', [ArticlesController::class, 'get'])->name('get');
        Route::get('/getArticle', [ArticlesController::class, 'getArticle'])->name('getArticle');
        Route::post('/created', [ArticlesController::class, 'created'])->name('created');
        Route::post('/edit', [ArticlesController::class, 'edit'])->name('edit');
        Route::post('/setStatus', [ArticlesController::class, 'setStatus'])->name('status');
        Route::post('/remove', [ArticlesController::class, 'remove'])->name('remove');
    });

    Route::name('utilities.')->prefix('utilities')->group(function () {
        Route::get('/getData', [UtilitiesController::class, 'getData'])->name('getData');
    });

    Route::name('request.')->prefix('request')->group(function () {
        Route::get('/get', [PressRequestController::class, 'get'])->name('request');
        Route::post('/setStatus', [PressRequestController::class, 'setStatus'])->name('status');
    });

    Route::name('settings.')->prefix('settings')->group(function () {
        Route::get('/getSettings', [SettingsController::class, 'getSettings'])->name('getSettings');
        Route::post('/setSettings', [SettingsController::class, 'setSettings'])->name('setSettings');
    });
});

/**
 *  Front
 */
Route::get('/', [CanvasController::class, 'canvas']);
Route::get('/{route}', [CanvasController::class, 'canvas'])->where('route', '.*');
