<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barang_keluar = BarangKeluar::all();
        return view('home.barang_keluar.index', compact('barang_keluar'));
    }

    public function create()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('home.barang_keluar.tambah', compact('barang','supplier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "id_barang" => 'required',
            "nama_customer" => 'required',
            "jumlah" => 'required|numeric'
        ]);

        $id = $request->id_barang;
        $barang = Barang::find($id);

        if ($barang->stok < $request->jumlah) {
            return redirect('/barang_keluar')->with('error', 'stok barang tidak mencukupi !!');
        }

        $barang->decrement('stok',$request->jumlah);
        BarangKeluar::create([
            "id_barang" =>$request->id_barang,
            "nama_customer" =>$request->nama_customer,
            "jumlah" =>$request->jumlah
        ]);
        return redirect('/barang_keluar')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $barang_keluar = BarangKeluar::find($id);
        return view('home.barang_keluar.show', compact('barang_keluar'));
    }
}
 