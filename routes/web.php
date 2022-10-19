<?php

namespace rezervace\routes;

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
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

// No login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('profile', ProfileController::class);

// User Routes
Route::prefix('user')->middleware('auth')->name('user.')->group(function () {
    Route::resource('/reservations', ReservationController::class);
    Route::resource('/bikes', BikeController::class);
    Route::get('full-calendar', [FullCalendarController::class, 'index']);
    Route::post('full-calendar/action', [FullCalendarController::class, 'action']);
});

// Admin routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::get('/departments', [DepartmentController::class, 'index']);

});
