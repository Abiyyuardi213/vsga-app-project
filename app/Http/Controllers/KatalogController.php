<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $query = Makanan::with('restoran');

        if ($search) {
            $query->where('nama_makanan', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        }

        $makanan = $query->get();

        return view('katalog.index', compact('makanan'));
    }
}
