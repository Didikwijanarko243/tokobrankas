<?php


use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

// Route::get('/produk-kategori', function () {
//     return view('pages.produk-kategori');
// })->name('produk-kategori');


// Route::resource('produk', ProductController::class)
//     ->parameters(['produk' => 'product'])
//     ->except('show')
//     ->middleware('auth'); // CRUD admin, wajib login
 
// Halaman publik (index & show) dibiarkan terbuka tanpa auth,
// supaya bisa diakses & di-crawl oleh Googlebot
Route::get('product', [ProductController::class, 'index'])->name('products.index');
Route::get('product/{product}', [ProductController::class, 'show'])->name('products.show');
