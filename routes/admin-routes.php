<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TempImagesController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfAdminLogin;
// Admin Route

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'index'])->name('login_form')->middleware('RedirectIfAdminLogin');
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

        Route::get('categories',[CategoryController::class, 'index'])->name('categories');
        Route::get('add-category',[CategoryController::class, 'create'])->name('add-category');
        Route::post('add-category',[CategoryController::class, 'store'])->name('create-category');
        Route::get('/categories/{id}/edit',[CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/update-category',[CategoryController::class, 'update'])->name('update-category');

        // Temp Image Uploading
        Route::post('upload-temp-image', [TempImagesController::class, 'create'])->name('temp.images.create');


        // Generate Slug
        Route::get('/get-slug', function (Request $request) {
            $slug = '';
            if (!empty($request->input('category_title'))) {
                $slug = Str::slug($request->category_title);
            }
            

            return response()->json([
                'status' =>'true',
                'slug' => $slug
            ]);

        })->name("get-slug"); 

    });

    Route::post('register', [AdminController::class, 'admin_register'])->name('admin.register.create');
   
});