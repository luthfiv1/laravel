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
                            <h3>Halaman Data Supplier</h3>
                            <a class="btn btn-primary" href="/supplier/tambah">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/supplier/simpan" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama_supplier</label>
                            <input
                                type="text"
                                class="form-control"
                                name="nama_supplier"
                                id=""
                                aria-describedby="helpId"
                                placeholder=""
                            />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Alamat</label>
                            <input
                                type="text"
                                class="form-control"
                                name="alamat"
                                id=""
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
                                aria-describedby="helpId"
                                placeholder=""
                            />
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        </form>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection