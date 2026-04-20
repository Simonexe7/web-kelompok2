<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'harga', 'stok'];

    public function details()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
