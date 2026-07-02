<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Data dasar produk
            $table->string('name');
            $table->string('slug')->unique(); // dipakai untuk URL cantik: /produk/nama-produk
            $table->string('sku')->unique()->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            // Harga & stok
            $table->decimal('price', 12, 2);
            $table->decimal('sale_price', 12, 2)->nullable();
            $table->unsignedInteger('stock')->default(0);

            // Gambar utama & galeri (galeri disimpan JSON agar simpel;
            // bisa dipisah ke tabel product_images kalau butuh lebih detail)
            $table->string('thumbnail')->nullable();
            $table->json('gallery')->nullable();

            // === Kolom khusus SEO ===
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 320)->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();

            // Open Graph
            $table->string('og_title')->nullable();
            $table->string('og_description', 320)->nullable();
            $table->string('og_image')->nullable();

            // Schema.org
            $table->string('schema_type')->default('Product');
            $table->string('brand')->nullable();
            $table->string('gtin')->nullable(); // barcode/EAN, opsional tapi bagus utk rich result
            $table->string('availability')->default('InStock'); // InStock, OutOfStock, PreOrder
            $table->decimal('rating_average', 3, 2)->nullable();
            $table->unsignedInteger('rating_count')->default(0);

            // Status
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['is_active', 'category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
};