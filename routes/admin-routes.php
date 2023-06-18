<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

// Admin Route

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'index'])->name('login_form');
    Route::post('admin.login', [AdminController::class, 'admin_login'])->name('admin.login');
    Route::get('logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    Route::get('register', [AdminController::class, 'register'])->name('admin.register');

    // Creating Group Middleware of Admin
    Route::middleware('admin')->group(function(){

        // Admin Routes
        Route::get('dashboard', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard');
        Route::get('view-profile', [AdminController::class, 'admin_profile'])->name('admin.view-profile');
        Route::get('edit-profile', [AdminController::class, 'edit_profile'])->name('admin.edit-profile');
        Route::post('update-profile', [AdminController::class, 'update_profile'])->name('update.profile');

        // Categories Routes

        Route::get('categories',[CategoryController::class,'view_categories'])->name('categories');
        Route::get('add-category',[CategoryController::class,'add_category'])->name('add-category');

    });

    Route::post('register', [AdminController::class, 'admin_register'])->name('admin.register.create');
   
});