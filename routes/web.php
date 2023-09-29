<?php

use App\Http\Controllers\BlacklistingsController;
use App\Http\Controllers\SchoolsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'index']);

// Route::get('/schools', [PagesController::class, 'schools']);

// Route::get('/create', [PagesController::class, 'createTeacher']);

Route::resource('/students', StudentsController::class);

Route::resource('/blacklistings', BlacklistingsController::class);

Route::resource('/schools', SchoolsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
