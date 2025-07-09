<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Restoran;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanan = Makanan::with('restoran')->get();
        return view('makanan.index', compact('makanan'));
    }

    public function create()
    {
        $restoran = Restoran::all();
        return view('makanan.create', compact('restoran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_makanan' => 'required|string|max:10|unique:makanan,id_makanan',
            'nama_makanan' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'id_restoran' => 'required|exists:restoran,id_restoran',
        ]);

        Makanan::create($request->all());

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id);
        $restoran = Restoran::all();
        return view('makanan.edit', compact('makanan', 'restoran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'id_restoran' => 'required|exists:restoran,id_restoran',
        ]);

        $makanan = Makanan::findOrFail($id);
        $makanan->update($request->all());

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $makanan = Makanan::findOrFail($id);
        $makanan->delete();

        return redirect()->route('makanan.index')->with('success', 'Data makanan berhasil dihapus.');
    }
}
