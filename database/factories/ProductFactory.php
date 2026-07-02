<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name  = ucfirst(fake()->unique()->words(3, true));
        $price = fake()->numberBetween(50_000, 5_000_000);

        // 40% kemungkinan produk sedang diskon
        $hasSale = fake()->boolean(40);

        return [
            'category_id'       => Category::inRandomOrder()->value('id') ?? Category::factory(),
            'name'              => $name,
            // slug, meta_title, meta_description, og_* di-generate otomatis oleh model
            'sku'               => strtoupper(fake()->unique()->bothify('SKU-####??')),
            'short_description' => fake()->sentence(12),
            'description'       => fake()->paragraphs(3, true),

            'price'      => $price,
            'sale_price' => $hasSale ? (int) ($price * 0.85) : null,
            'stock'      => fake()->numberBetween(0, 200),

            'thumbnail' => 'https://picsum.photos/seed/' . fake()->uuid() . '/600/600',
            'gallery'   => [
                'https://picsum.photos/seed/' . fake()->uuid() . '/600/600',
                'https://picsum.photos/seed/' . fake()->uuid() . '/600/600',
            ],

            'brand'        => fake()->company(),
            'gtin'         => fake()->ean13(),
            'availability' => fake()->randomElement(['InStock', 'InStock', 'InStock', 'OutOfStock']),

            'rating_average' => fake()->randomFloat(2, 3, 5),
            'rating_count'   => fake()->numberBetween(0, 500),

            'is_active'   => fake()->boolean(90),
            'is_featured' => fake()->boolean(20),
        ];
    }

    /**
     * State: produk unggulan
     * Pemakaian: Product::factory()->featured()->create();
     */
    public function featured(): static
    {
        return $this->state(fn () => ['is_featured' => true]);
    }

    /**
     * State: stok habis
     * Pemakaian: Product::factory()->outOfStock()->create();
     */
    public function outOfStock(): static
    {
        return $this->state(fn () => [
            'stock'        => 0,
            'availability' => 'OutOfStock',
        ]);
    }
}