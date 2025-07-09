<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use Illuminate\Http\Request;

class RestoranController extends Controller
{
    public function index()
    {
        $restorans = Restoran::all();
        return view('restoran.index', compact('restorans'));
    }

    public function create()
    {
        return view('restoran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_restoran' => 'required|unique:restoran,id_restoran',
            'nama_restoran' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'telepon' => 'required|string',
        ]);

        Restoran::create($request->all());

        return redirect()->route('restoran.index')->with('success', 'Data restoran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $restoran = Restoran::findOrFail($id);
        return view('restoran.edit', compact('restoran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_restoran' => 'required|string|max:100',
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'telepon' => 'required|string',
        ]);

        $restoran = Restoran::findOrFail($id);
        $restoran->update($request->all());

        return redirect()->route('restoran.index')->with('success', 'Data restoran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $restoran = Restoran::findOrFail($id);
        $restoran->delete();

        return redirect()->route('restoran.index')->with('success', 'Data restoran berhasil dihapus.');
    }
}
