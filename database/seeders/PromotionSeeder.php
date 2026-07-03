<?php
namespace Database\Seeders;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::inRandomOrder()->take(5)->get();

        if ($products->count() < 5) {
            $this->command->warn('Produk kurang dari 5, jalankan ProductSeeder dulu.');
            return;
        }

        $promotions = [
            [
                'title'            => 'Hemat Rp500.000 hari ini untuk pembelian ' . $products[0]->name . '.',
                'description'      => 'Pesan sekarang dan nikmati diskon eksklusif untuk aktivasi yang memenuhi syarat. Stok terbatas.',
                'discount_amount'  => 500000,
                'discount_percent' => null,
                'button_text'      => 'Pesan Sekarang',
                'is_active'        => true,
            ],
            [
                'title'            => 'Diskon 20% khusus ' . $products[1]->name . ' minggu ini.',
                'description'      => 'Dapatkan penawaran spesial sebelum promo berakhir. Kualitas premium, harga lebih hemat.',
                'discount_amount'  => null,
                'discount_percent' => 20,
                'button_text'      => 'Beli Sekarang',
                'is_active'        => true,
            ],
            [
                'title'            => 'Promo terbatas: ' . $products[2]->name . ' turun harga.',
                'description'      => 'Kesempatan langka mendapatkan produk berkualitas dengan harga spesial. Buruan sebelum kehabisan.',
                'discount_amount'  => 250000,
                'discount_percent' => null,
                'button_text'      => 'Lihat Detail',
                'is_active'        => true,
            ],
            [
                'title'            => 'Flash Sale ' . $products[3]->name . ' hanya hari ini.',
                'description'      => 'Penawaran spesial dalam waktu terbatas. Jangan sampai terlewat, stok sangat terbatas.',
                'discount_amount'  => null,
                'discount_percent' => 15,
                'button_text'      => 'Pre-order now',
                'is_active'        => true,
                'starts_at'        => now(),
                'ends_at'          => now()->addDays(3),
            ],
            [
                'title'            => 'Penawaran eksklusif untuk ' . $products[4]->name . '.',
                'description'      => 'Nikmati kualitas terbaik dengan harga yang lebih terjangkau. Promo berlaku selama persediaan masih ada.',
                'discount_amount'  => 350000,
                'discount_percent' => null,
                'button_text'      => 'Order Sekarang',
                'is_active'        => true,
            ],
        ];

        foreach ($promotions as $index => $data) {
            Promotion::create([
                'product_id' => $products[$index]->id,
                ...$data,
            ]);
        }

        $this->command->info('5 data promosi berhasil dibuat.');
    }
}
