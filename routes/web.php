<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route untuk memproses form login
Route::post('/login', [LoginController::class, 'login']);

// Route untuk logout (gunakan POST untuk keamanan)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');



// Route::resource('produk', ProductController::class)
//     ->parameters(['produk' => 'product'])
//     ->except('show')
//     ->middleware('auth'); // CRUD admin, wajib login
 
// Halaman publik (index & show) dibiarkan terbuka tanpa auth,
// supaya bisa diakses & di-crawl oleh Googlebot
Route::get('product', [ProductController::class, 'index'])->name('products.index');
Route::get('product/{product}', [ProductController::class, 'show'])->name('products.show');



//admin

