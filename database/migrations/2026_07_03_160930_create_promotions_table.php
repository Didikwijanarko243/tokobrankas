<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();                         // opsional, kalau kosong pakai gambar produk
            $table->decimal('discount_amount', 12, 2)->nullable();       // potongan harga (Rp)
            $table->unsignedTinyInteger('discount_percent')->nullable(); // atau potongan persen
            $table->string('button_text')->default('Pre-order now');
            $table->string('button_link')->nullable(); // kalau kosong, arahkan ke halaman produk
            $table->boolean('is_active')->default(true);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
