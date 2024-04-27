<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('common.')->group(function (){
    Route::get('/', [\App\Http\Controllers\MainController::class, 'main'])->name('main');
    Route::get('/contact', [\App\Http\Controllers\MainController::class, 'contact'])->name('contact');
    Route::get('/form', [\App\Http\Controllers\MainController::class, 'form'])->name('form');
    Route::get('/about', [\App\Http\Controllers\MainController::class, 'about'])->name('about');
    Route::post('/contactForm', [\App\Http\Controllers\MainController::class, 'contactForm'])->name('contactForm');
    Route::post('/formJobs', [\App\Http\Controllers\MainController::class, 'formJobs'])->name('formJobs');
});

Route::name('news.')->prefix('news')->group(function (){
    Route::get('/', [\App\Http\Controllers\ArticlesController::class, 'main'])->name('main');
    Route::get('/{slug}', [\App\Http\Controllers\ArticlesController::class, 'info'])->name('info');
});

Route::name('employees.')->prefix('employees')->group(function (){
    Route::get('/', [\App\Http\Controllers\EmployeesController::class, 'main'])->name('main');
    Route::get('/{id}', [\App\Http\Controllers\EmployeesController::class, 'info'])->name('info');
});


Route::get('/language/{language}', [LanguageController::class, 'set'])->name('language.set');


