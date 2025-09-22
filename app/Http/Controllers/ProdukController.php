<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Jangan lupa import model
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Method untuk menampilkan semua produk (pengganti index.php)
    public function index()
    {
        // Ambil semua data produk dari database menggunakan Model
        $produk = Produk::latest()->get(); // Ambil produk terbaru

        // Kirim data ke view
        return view('home', ['produks' => $produk]);
    }

    // Method untuk menampilkan detail produk (pengganti detail.php)
    public function show(Produk $produk) // Ini disebut Route Model Binding
    {
        // Laravel otomatis mencari produk berdasarkan ID dari URL
        // Tidak perlu lagi "SELECT * FROM produk WHERE id=..."

        return view('produk.show', ['produk' => $produk]);
    }
}