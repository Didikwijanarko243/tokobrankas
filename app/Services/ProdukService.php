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
            ->featured()
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

        return $products;

    }

    public function getProduk()
    {
        $products = Product::query()
            ->active()
            ->with('category')
            ->when($request->filled('category'), function ($q) use ($request) {
                $q->whereHas('category', fn ($c) => $c->where('slug', $request->category));
            })
            ->when($request->filled('q'), function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->q . '%');
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();
    }
}
