<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\PesananDetail;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil beberapa user dan produk yang sudah ada sebagai sampel
        $users = User::all();
        $produks = Produk::all();

        // Hentikan seeder jika tidak ada user atau produk untuk menghindari error
        if ($users->isEmpty() || $produks->isEmpty()) {
            $this->command->info('Tidak dapat menjalankan PesananSeeder karena tidak ada User atau Produk.');
            return;
        }

        // 2. Buat beberapa pesanan palsu (misalnya 5 pesanan)
        for ($i = 0; $i < 5; $i++) {
            // Pilih user secara acak
            $user = $users->random();
            $totalHargaPesanan = 0;

            // Buat record pesanan utama dengan total harga sementara 0
            $pesanan = Pesanan::create([
                'user_id' => $user->id,
                'total_harga' => 0, // Akan diupdate nanti
                'status' => ['pending', 'processing', 'shipped'][array_rand(['pending', 'processing', 'shipped'])],
            ]);

            // 3. Tambahkan beberapa item produk ke dalam setiap pesanan (1 sampai 3 item)
            $jumlahItem = rand(1, 3);
            $itemProduk = $produks->random($jumlahItem);

            foreach ($itemProduk as $produk) {
                $jumlahBeli = rand(1, 2);
                
                PesananDetail::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $produk->id,
                    'jumlah' => $jumlahBeli,
                    'harga' => $produk->harga, // Simpan harga produk saat itu
                ]);

                // Akumulasi total harga
                $totalHargaPesanan += $produk->harga * $jumlahBeli;
            }

            // 4. Update pesanan utama dengan total harga yang benar
            $pesanan->update(['total_harga' => $totalHargaPesanan]);
        }
    }
}