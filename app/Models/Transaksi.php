<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['user_id', 'cabang_id', 'tanggal', 'total', 'kode_transaksi'];

    public function details()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}

