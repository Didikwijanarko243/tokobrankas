<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Elektronik',
            'Fashion Pria',
            'Fashion Wanita',
            'Kesehatan & Kecantikan',
            'Rumah Tangga',
            'Olahraga & Outdoor',
            'Hobi & Koleksi',
            'Makanan & Minuman',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        // Tambahan kategori random kalau butuh lebih banyak data dummy
        Category::factory()->count(4)->create();
    }
}