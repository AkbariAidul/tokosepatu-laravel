<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_harga', 'status'];

    // Relasi: Satu pesanan dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Satu pesanan memiliki banyak item detail
    public function details()
    {
        return $this->hasMany(PesananDetail::class);
    }
}
