<?php


use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::resource('produk', ProductController::class)
    ->parameters(['produk' => 'product'])
    ->except('show')
    ->middleware('auth'); // CRUD admin, wajib login
 
// Halaman publik (index & show) dibiarkan terbuka tanpa auth,
// supaya bisa diakses & di-crawl oleh Googlebot
Route::get('produkc', [ProductController::class, 'index'])->name('products.index');
Route::get('produk/{product}', [ProductController::class, 'show'])->name('products.show');
