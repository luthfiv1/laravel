@extends('layouts.master')
@section('title', 'barang keluar')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if(session('success'))
                            <div class="alert alert-info">
                                {{ session('success') }}
                            </div>
                            @endif
                            <h3>Halaman Data Barang Keluar</h3>
                            <a href="/barang_keluar/tambah" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="card-body">
                            <div
                                class="table-bordered table-striped"
                            >
                                <table
                                    class="table table-primary"
                                >
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">id Barang</th>
                                            <th scope="col">Nama customer</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barang_keluar as $barang_keluar)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$barang_keluar->barang->id_barang}}</td>
                                            <td>{{$barang_keluar->supplier->nama_customer}}</td>
                                            <td>{{$barang_keluar->jumlah}}</td>
                                            <td>
                                                <a href="/barang_keluar/{{$barang_keluar->id}}/show" class="btn btn-info"><i class="fas fa-eye"></i>Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection