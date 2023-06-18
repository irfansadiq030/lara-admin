<?php

use App\Http\Controllers\AdminController;

// Admin Route

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'index'])->name('login_form');
    Route::post('admin.login', [AdminController::class, 'admin_login'])->name('admin.login');
    Route::get('dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    Route::get('register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('register', [AdminController::class, 'admin_register'])->name('admin.register.create');
    Route::get('view-profile', [AdminController::class, 'admin_profile'])->name('admin.view-profile');
});