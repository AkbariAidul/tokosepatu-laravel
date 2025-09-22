<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data pesanan terbaru, beserta data user-nya (untuk menghindari N+1 problem)
    $pesanans = Pesanan::with('user')->latest()->paginate(10);
    return view('admin.pesanan.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        // Eager load relasi: user, dan untuk setiap item detail, load juga data produknya.
    $pesanan->load('user', 'details.produk');

    return view('admin.pesanan.show', compact('pesanan'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
        'status' => 'required|in:pending,processing,shipped,completed,cancelled',
    ]);

    $pesanan->update([
        'status' => $request->status,
    ]);

    return redirect()->route('admin.pesanan.show', $pesanan)->with('success', 'Status pesanan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
