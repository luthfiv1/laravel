@extends('layouts.master')
@section('tittle', 'supplier')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Halaman Edit Data Supplier</h3>
                            <a class="btn btn-warning" href="/supplier">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/supplier/ {{ $supplier->id }}/update" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama_supplier</label>
                            <input
                                type="name"
                                class="form-control"
                                name="nama_supplier"
                                id=""
                                value="{{ $supplier->nama_supplier }}"
                                aria-describedby="helpId"
                                placeholder=""
                            />
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <input
                                type="text"
                                class="form-control"
                                name="alamat"
                                id=""
                                 value="{{ $supplier->alamat }}"
                                aria-describedby="helpId"
                                placeholder=""
                            />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">No_tlp</label>
                            <input
                                type="text"
                                class="form-control"
                                name="no_tlp"
                                id=""
                                 value="{{ $supplier->no_tlp }}"
                                aria-describedby="helpId"
                                placeholder=""
                            />
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection