<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data produk, urutkan dari yang terbaru, dan gunakan pagination
        $produks = Produk::latest()->paginate(10); 

        // Kirim data ke view
        return view('admin.produk.index', ['produks' => $produks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all(); // Ambil semua data kategori
        return view('admin.produk.create', ['kategoris' => $kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'harga' => 'required|integer',
            'ketersediaan_stok' => 'required|string',
            'detail' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Upload Gambar
        $path = $request->file('foto')->store('produk', 'public');
        $namaFile = basename($path);

        // 3. Simpan Data ke Database
        Produk::create([
            'nama' => $request->nama,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'detail' => $request->detail,
            'ketersediaan_stok' => $request->ketersediaan_stok,
            'foto' => $namaFile,
        ]);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        // Ambil semua data kategori untuk dropdown
        $kategoris = Kategori::all();

        // Tampilkan view edit dan kirim data produk yang akan diubah serta data kategori
        return view('admin.produk.edit', [
            'produk' => $produk,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        // 1. Validasi Input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'harga' => 'required|integer',
            'ketersediaan_stok' => 'required|string',
            'detail' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // foto dibuat nullable (opsional)
        ]);

        // Ambil semua data kecuali _token dan _method
        $data = $request->except(['_token', '_method']);

        // 2. Cek apakah ada foto baru yang di-upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            // Upload foto baru dan simpan path-nya
            $path = $request->file('foto')->store('produk', 'public');
            $data['foto'] = basename($path);
        }

        // 3. Update data produk di database
        $produk->update($data);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
{
    // 1. Hapus file gambar dari storage untuk menghemat ruang
    if ($produk->foto) {
        Storage::disk('public')->delete('produk/' . $produk->foto);
    }

    // 2. Hapus data produk dari database
    $produk->delete();

    // 3. Redirect kembali ke halaman daftar produk dengan pesan sukses
    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
}
}
