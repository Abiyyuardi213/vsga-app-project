<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restoran;
use App\Models\Makanan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRestoran     = Restoran::count();
        $totalMakanan      = Makanan::count();

        return view('dashboard-admin', compact('totalRestoran' , 'totalMakanan'));
    }
}
