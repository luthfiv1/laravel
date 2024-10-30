<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('home.barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        
        $jenis = Jenis::all();
        return view('home.barang.tambah', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'nama_barang' => 'required|min:5',
            'id_jenis' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/products', $image->hashName());

        //membuat product
        Barang::create([
            'gambar' => $image->hashName(),
            'nama_barang' => $request->nama_barang,
            'id_jenis' => $request->id_jenis,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok
        ]);
        //redirect to index
        return redirect('/barang')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenis = Jenis::all();
        $barang = Barang::find($id);
        return view('home.barang.edit', compact('jenis', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate form
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'nama_barang' => 'required|min:5',
            'id_jenis' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        //get product by id
        $barang = Barang::find($id);

        //check if image is upload
        if ($request->hasFile('gambar')) {

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/products', $image->hashName());

            //delete old image
            Storage::delete('public/products/' . $barang->gambar);

            //update product with new image
            $barang->update([
                'gambar' => $image->hashName(),
                'nama_barang' => $request->nama_barang,
                'id_jenis' => $request->id_jenis,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok
            ]);
        } else {

            // update without image
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'id_jenis' => $request->id_jenis,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok
            ]);
        }

        //redirect to index
        return redirect('/barang')->with(['success' => 'Data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //ambil id barang
        $barang = Barang::find($id);

        //hapus gambar
        Storage::delete('public/product/' . $barang->gambar);

        //hapus barang
        $barang->delete();

        //kembali ke index
        return redirect('/barang')->with(['success'=>'Data Berhasil Dihapus']);
    }
}
