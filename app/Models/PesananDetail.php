<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesananDetail extends Model
{
    use HasFactory;

    protected $fillable = ['pesanan_id', 'produk_id', 'jumlah', 'harga'];

    // Relasi: Satu detail pesanan milik satu produk
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
