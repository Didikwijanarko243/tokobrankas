<?php


namespace App\Services;
use App\Models\Category;
use App\Models\Product;

class ProdukService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getFeatured($limit = 8)
    {
        $products = Product::query()
            ->active()
            ->with('category')
            ->latest()
            ->take($limit)
            ->get();

        // $categories = Category::orderBy('name')->get();

        // Data SEO untuk halaman listing (dipakai di <head> Blade)
        $seo = [
            'title'       => 'Brankas Termurah'
                ? 'Hasil pencarian: Produk Unggulan' 
                : 'Semua Produk',
            'description' => 'Produk Unggulan Kami, Tersedia dengan Harga Terbaik.',
            'canonical'   => url()->current(),
        ];

        // return $products;
        // dd($products);
        return $products;
        // return Product::where('is_active', true)
        //     ->where('is_featured', true)
        //     ->latest()
        //     ->take($limit)
        //     ->get();
    }
}
