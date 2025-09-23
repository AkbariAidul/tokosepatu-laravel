<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function show(Kategori $kategori)
    {
        // Ambil produk yang berelasi dengan kategori ini
        $produks = $kategori->produks()->paginate(12);

        // Tampilkan view
        return view('kategori.show', compact('kategori', 'produks'));
    }
}