<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'short_description',
        'description',
        'price',
        'sale_price',
        'stock',
        'thumbnail',
        'gallery',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_title',
        'og_description',
        'og_image',
        'schema_type',
        'brand',
        'gtin',
        'availability',
        'rating_average',
        'rating_count',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'gallery'        => 'array',
        'price'          => 'decimal:2',
        'sale_price'     => 'decimal:2',
        'rating_average' => 'decimal:2',
        'is_active'      => 'boolean',
        'is_featured'    => 'boolean',
    ];

    /**
     * Pakai "slug" sebagai route key, bukan id.
     * Efeknya: Route::get('/produk/{product}', ...) otomatis
     * resolve berdasarkan slug -> URL jadi SEO friendly.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug unik setiap kali produk dibuat/nama diubah
        static::saving(function (Product $product) {
            if (empty($product->slug) || $product->isDirty('name')) {
                $product->slug = static::generateUniqueSlug($product->name, $product->id);
            }

            // Fallback: kalau meta_title/meta_description kosong,
            // isi otomatis dari data produk supaya tetap SEO-friendly
            if (empty($product->meta_title)) {
                $product->meta_title = $product->name;
            }

            if (empty($product->meta_description) && $product->short_description) {
                $product->meta_description = Str::limit(
                    strip_tags($product->short_description),
                    160
                );
            }

            if (empty($product->og_title)) {
                $product->og_title = $product->meta_title;
            }

            if (empty($product->og_description)) {
                $product->og_description = $product->meta_description;
            }

            if (empty($product->og_image) && $product->thumbnail) {
                $product->og_image = $product->thumbnail;
            }
        });
    }

    protected static function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn (Builder $q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    // ==================== RELASI ====================

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // ==================== SCOPES ====================

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    // ==================== ACCESSOR ====================

    public function getFinalPriceAttribute()
    {
        return $this->sale_price && $this->sale_price < $this->price
            ? $this->sale_price
            : $this->price;
    }

    public function getCanonicalUrlAttribute($value)
    {
        // Kalau canonical_url tidak diisi manual, generate otomatis
        return $value ?: url('/produk/' . $this->slug);
    }

    /**
     * Generate array JSON-LD Schema.org untuk produk ini.
     * Tinggal di-echo di blade:
     * <script type="application/ld+json">{!! json_encode($product->schemaMarkup()) !!}</script>
     */
    public function schemaMarkup(): array
    {
        return [
            '@context'    => 'https://schema.org/',
            '@type'       => $this->schema_type ?: 'Product',
            'name'        => $this->name,
            'description' => $this->meta_description ?: Str::limit(strip_tags($this->description), 160),
            'sku'         => $this->sku,
            'gtin'        => $this->gtin,
            'brand'       => [
                '@type' => 'Brand',
                'name'  => $this->brand ?: config('app.name'),
            ],
            'image' => $this->gallery
                ? array_merge([$this->thumbnail], $this->gallery)
                : [$this->thumbnail],
            'offers' => [
                '@type'         => 'Offer',
                'url'           => $this->canonical_url,
                'priceCurrency' => 'IDR',
                'price'         => (string) $this->final_price,
                'availability'  => 'https://schema.org/' . $this->availability,
            ],
            'aggregateRating' => $this->rating_count > 0 ? [
                '@type'       => 'AggregateRating',
                'ratingValue' => (string) $this->rating_average,
                'reviewCount' => (string) $this->rating_count,
            ] : null,
        ];
    }
}