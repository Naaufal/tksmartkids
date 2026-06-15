<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\CategoryController;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang-kami', [PublicController::class, 'about'])->name('about');
Route::get('/fasilitas', [PublicController::class, 'fasilitas'])->name('fasilitas');
Route::get('/galeri', [PublicController::class, 'gallery'])->name('gallery');
Route::get('/harga-kontak', [PublicController::class, 'pricingContact'])->name('pricing');

// Admin Auth Routes (Guest Only)
Route::middleware([])->group(function () {
    Route::get('/admin/login', [LoginController::class, 'loginForm'])->name('admin.login');
    Route::post('/admin/login', [LoginController::class, 'login']);
});

// Admin Protected Routes
Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Gallery & Category (Superadmin & Kepala Sekolah)
    Route::middleware(['role:superadmin,kepala_sekolah'])->group(function () {
        // Photo Management
        Route::get('/admin/galeri', [GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('/admin/galeri/upload', [GalleryController::class, 'uploadForm'])->name('admin.gallery.upload');
        Route::post('/admin/galeri/upload', [GalleryController::class, 'upload'])->name('admin.gallery.store');
        Route::delete('/admin/galeri/{photo}', [GalleryController::class, 'delete'])->name('admin.gallery.destroy');
        Route::post('/admin/galeri/{photo}/kategori', [GalleryController::class, 'assignCategory'])->name('admin.gallery.assign_category');

        // Category Management
        Route::get('/admin/galeri/kategori', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/admin/galeri/kategori/tambah', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/admin/galeri/kategori', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/admin/galeri/kategori/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::put('/admin/galeri/kategori/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/admin/galeri/kategori/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
});

