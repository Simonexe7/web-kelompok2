<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::query();

        // FILTER TANGGAL
        if ($request->dari && $request->sampai) {
            $query->whereBetween('created_at', [
                $request->dari,
                $request->sampai
            ]);
        }

        $transaksis = $query->latest()->get();

        // TOTAL
        $total = $transaksis->sum('total');
        $jumlah = $transaksis->count();

        return view('laporan.index', compact(
            'transaksis',
            'total',
            'jumlah'
        ));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('details.barang')->findOrFail($id);

        return view('laporan.show', compact('transaksi'));
    }

}
