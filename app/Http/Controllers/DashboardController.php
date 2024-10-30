<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Supplier;

class DashboardController extends Controller
{
    public function index()
    {
        // $barang_masuk = BarangMasuk::all();
        // $barang_keluar = BarangKeluar::all();
        // $barang = Barang::all();
        $totalBarang =  Barang::count();
        $totalBarangMasuk=  BarangMasuk::sum('jumlah');
        $totalBarangKeluar =  BarangKeluar::sum('jumlah');
        $totalSupplier =  Supplier::sum('id');

        $dataBarangMasuk = BarangMasuk::with('barang', 'supplier')->get();
        $dataBarangKeluar = BarangKeluar::with('barang')->get();

        return view('home.dashboard', compact('totalBarang', 'totalBarangMasuk', 'totalBarangKeluar', 'totalSupplier', 'dataBarangMasuk', 'dataBarangKeluar'));
    }
}
