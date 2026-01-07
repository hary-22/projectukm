<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalBarang' => Barang::count(),
            'totalKategori' => Kategori::count(),
            'totalUser' => User::count(),
        ]);
    }
}
