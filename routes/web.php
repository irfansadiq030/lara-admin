<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

// Admin Route

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'index'])->name('login_form');
    Route::post('admin.login', [AdminController::class, 'admin_login'])->name('admin.login');
    Route::get('dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    Route::get('register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('register', [AdminController::class, 'admin_register'])->name('admin.register.create');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
