<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function create()
    {
        $barangs = Barang::all();
        return view('transaksi.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        // ✅ validasi basic
        if (!$request->has('items') || count($request->items) == 0) {
            return back()->with('error', 'Tidak ada barang dipilih');
        }

        // 🔥 buat transaksi awal
        $transaksi = Transaksi::create([
            'user_id' => Auth::id(),
            'cabang_id' => 1, // sementara (nanti dinamis)
            'tanggal' => now(),
            'total' => 0,
        ]);

        $total = 0;

        foreach ($request->items as $item) {

            // 🔒 validasi qty
            if ($item['qty'] < 1) {
                return back()->with('error', 'Qty tidak valid');
            }

            // 🔥 ambil data barang dari DB (JANGAN percaya frontend)
            $barang = Barang::find($item['barang_id']);

            if (!$barang) {
                return back()->with('error', 'Barang tidak ditemukan');
            }

            // 🔒 cek stok
            if ($barang->stok < $item['qty']) {
                return back()->with('error', 'Stok tidak cukup untuk ' . $barang->nama);
            }

            // 🔥 hitung ulang (AMAN)
            $harga = $barang->harga;
            $subtotal = $harga * $item['qty'];

            // 💾 simpan detail
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'barang_id' => $barang->id,
                'qty' => $item['qty'],
                'harga' => $harga,
                'subtotal' => $subtotal
            ]);

            // 📦 update stok
            $barang->decrement('stok', $item['qty']);

            $total += $subtotal;
        }

        // 🔥 update total transaksi
        $transaksi->update([
            'total' => $total
        ]);

        return redirect('/transaksi/create')->with('success', 'Transaksi berhasil');
    }

}
