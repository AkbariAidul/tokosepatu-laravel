<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    protected $table = 'produk';
    
    protected $fillable = [
        'nama',
        'kategori_id',
        'harga',
        'detail',
        'ketersediaan_stok',
        'foto',
    ];

    /**
     * Relasi ke model Kategori.
     * PASTIKAN NAMA METHOD INI "kategori" (HURUF KECIL SEMUA)
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}