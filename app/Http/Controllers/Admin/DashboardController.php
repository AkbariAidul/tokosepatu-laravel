<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data dari setiap model
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();
        $totalUser = User::count(); // Kita tambahkan juga jumlah user

        // Kirim data ke view menggunakan compact()
        return view('admin.dashboard', compact('totalProduk', 'totalKategori', 'totalUser'));
    }
}