<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * GET /produk
     * Halaman listing produk (publik) — mendukung filter kategori & pencarian.
     */
    public function index(Request $request, ): View
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

        $categories = Category::withCount('products')->orderBy('name')->get();

        // Data SEO untuk halaman listing (dipakai di <head> Blade)
        $seo = [
            'title'       => $request->filled('q')
                ? 'Hasil pencarian: ' . $request->q
                : 'Semua Produk',
            'description' => 'Jelajahi katalog produk lengkap kami dengan harga terbaik.',
            'canonical'   => url()->current(),
        ];

        return view('pages.produk', compact('products', 'categories', 'seo'));
    }

    /**
     * GET /produk/create
     */
    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    /**
     * POST /produk
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateProduct($request);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
        }

        $product = Product::create($data);

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * GET /produk/{product}
     * Route model binding otomatis pakai slug (lihat Product::getRouteKeyName).
     */
    public function show(Product $product): View
    {
        $product->load('category');

        $related = Product::query()
            ->active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        // Data SEO siap pakai untuk meta tag, Open Graph, dan JSON-LD di Blade
        $seo = [
            'title'       => $product->meta_title,
            'description' => $product->meta_description,
            'canonical'   => $product->canonical_url,
            'og_title'    => $product->og_title,
            'og_description' => $product->og_description,
            'og_image'    => $product->og_image,
            'schema'      => $product->schemaMarkup(),
        ];
// dd($product);
        return view('pages.produk_detail', compact('product', 'related', 'seo'));
    }

    /**
     * GET /produk/{product}/edit
     */
    public function edit(Product $product): View
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * PUT/PATCH /produk/{product}
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $data = $this->validateProduct($request, $product->id);

        if ($request->hasFile('thumbnail')) {
            if ($product->thumbnail) {
                Storage::disk('public')->delete($product->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('products.show', $product)
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * DELETE /produk/{product}
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * Validasi input create & update.
     */
    private function validateProduct(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'category_id'        => ['nullable', 'exists:categories,id'],
            'name'               => ['required', 'string', 'max:255'],
            'sku'                => ['nullable', 'string', 'max:100', 'unique:products,sku,' . $ignoreId],
            'short_description'  => ['nullable', 'string', 'max:500'],
            'description'        => ['nullable', 'string'],
            'price'              => ['required', 'numeric', 'min:0'],
            'sale_price'         => ['nullable', 'numeric', 'min:0', 'lt:price'],
            'stock'              => ['required', 'integer', 'min:0'],
            'thumbnail'          => ['nullable', 'image', 'max:2048'],
            'brand'              => ['nullable', 'string', 'max:255'],
            'gtin'               => ['nullable', 'string', 'max:50'],
            'availability'       => ['nullable', 'in:InStock,OutOfStock,PreOrder'],
            'is_active'          => ['nullable', 'boolean'],
            'is_featured'        => ['nullable', 'boolean'],
            'meta_title'         => ['nullable', 'string', 'max:255'],
            'meta_description'   => ['nullable', 'string', 'max:320'],
            'meta_keywords'      => ['nullable', 'string', 'max:255'],
        ]);
    }
}