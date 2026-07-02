<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan kategori sudah ada dulu
        if (Category::count() === 0) {
            $this->call(CategorySeeder::class);
        }

        // 50 produk acak biasa
        Product::factory()->count(50)->create();

        // 10 produk unggulan (featured)
        Product::factory()->count(10)->featured()->create();

        // 5 produk stok habis, buat testing tampilan "Stok Habis"
        Product::factory()->count(5)->outOfStock()->create();
    }
}