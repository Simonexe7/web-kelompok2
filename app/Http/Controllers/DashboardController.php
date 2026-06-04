<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Cabang;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBarang = Barang::count();
        $jumlahCabang = Cabang::count();
        $jumlahTransaksi = Transaksi::count();
        $jumlahUser = User::count();

        return view('dashboard', compact(
            'jumlahBarang',
            'jumlahCabang',
            'jumlahTransaksi',
            'jumlahUser'
        ));
    }
}