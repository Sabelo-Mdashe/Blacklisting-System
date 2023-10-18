<?php

use App\Http\Controllers\BlacklistingsController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::resource('/students', StudentsController::class);

Route::resource('/blacklistings', BlacklistingsController::class);

Route::resource('/schools', SchoolsController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('update', [HomeController::class, 'update']);
Route::put('/update/{user}', [HomeController::class, 'updateProfile']);

// Route::get('search', [StudentsController::class, 'searchStudent']);

// Route::get('searchschool', [SchoolsController::class, 'searchSchool']);
