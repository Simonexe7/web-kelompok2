<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $cabang = Cabang::all();
        return view('cabang.index', compact('cabang'));
    }

    public function create()
    {
        return view('cabang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'alamat' => 'required',
            'telepon' => 'nullable'
        ]);

        Cabang::create($request->all());

        return redirect()->route('cabang.index')
                         ->with('success', 'Data cabang berhasil ditambahkan');
    }

    public function edit(Cabang $cabang)
    {
        return view('cabang.edit', compact('cabang'));
    }

    public function update(Request $request, Cabang $cabang)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'alamat' => 'required',
            'telepon' => 'nullable'
        ]);

        $cabang->update($request->all());

        return redirect()->route('cabang.index')
                         ->with('success', 'Data cabang berhasil diupdate');
    }

    public function destroy(Cabang $cabang)
    {
        $cabang->delete();

        return redirect()->route('cabang.index')
                         ->with('success', 'Data cabang berhasil dihapus');
    }
}