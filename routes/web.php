<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login'); // FIXME: Show landing page

// Post Route
Route::get('/berita', [FrontendController::class, 'posts'])->name('fe.posts');
Route::get('/berita/{slug}', [FrontendController::class, 'post'])->name('fe.post');
Route::get('/berita/semua-kategori', [FrontendController::class, 'categories'])->name('fe.categories');
Route::get('/berita/kategori/{slug}', [FrontendController::class, 'category'])->name('fe.category');

// Page Route
Route::get('/{slug}', [FrontendController::class, 'page'])->name('fe.page');
