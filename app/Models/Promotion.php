<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'product_id',
        'title',
        'description',
        'image',
        'discount_amount',
        'discount_percent',
        'button_text',
        'button_link',
        'is_active',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Scope untuk ambil promo yang sedang aktif & dalam periode berlaku
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('starts_at')->orWhere('starts_at', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('ends_at')->orWhere('ends_at', '>=', now());
            });
    }

    // Ambil gambar promo, fallback ke gambar produk kalau kosong
    public function getDisplayImageAttribute(): ?string
    {
        return $this->image ?? $this->product->thumbnail ?? null;
    }

    // Ambil link tombol, fallback ke halaman detail produk
    public function getDisplayLinkAttribute(): string
    {
        return $this->button_link ?? route('products.show', $this->product->slug);
    }
}
