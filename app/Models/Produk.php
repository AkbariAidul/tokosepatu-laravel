<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Produk extends Model
{
    use HasFactory;

    // relasi ke tabel kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);   
    }
}
