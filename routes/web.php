<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');


Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk halaman barang
Route::get('/admin', [AdminController::class, 'HalamanBarang'])->name('admin.HalamanBarang');
Route::get('/Tambah', [AdminController::class, 'Tambah'])->name('admin.Tambah');
Route::post('/admin/submit', [AdminController::class, 'submit'])->name('admin.submit');
Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::get('/admin/halaman-barang', [AdminController::class, 'HalamanBarang'])->name('admin.HalamanBarang');
Route::get('/admin/export-pdf', [AdminController::class, 'exportPdf'])->name('admin.exportPdf');








require __DIR__.'/auth.php';
