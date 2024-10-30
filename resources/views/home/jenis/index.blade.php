@extends('layouts.master')
@section('tittle', 'jenis')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Data Jenis</h3>
                            <a class="btn btn-primary" href="/jenis/tambah">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">id</th>
                                        <th scope="col">Nama_jenis</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jenis as $jenis)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $jenis->id}}</td>
                                        <td>{{ $jenis->nama_jenis}}</td>
                                        <td><a class="btn btn-warning" href="/jenis/{{ $jenis->id }}/show">Edit</a>
                                            <a class="btn btn-danger" href="/jenis/{{ $jenis->id }}/delete" onclick="return confirm('YAKIN DEK ?')">Delete</a>
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
    </section>
</div>
@endsection