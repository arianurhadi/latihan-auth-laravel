<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

//route auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registration'])->name('register.registration');


//route middleware auth
Route::middleware('auth')->group(function(){
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('role');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/student/dashboard', [DashboardController::class, 'index'])->name('dashboard.student');
    
});

