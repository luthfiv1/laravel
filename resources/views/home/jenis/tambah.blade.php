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
                            <h3>Halaman Data jenis</h3>
                            <a class="btn btn-primary" href="/jenis/tambah">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/jenis/simpan" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nama jenis</label>
                            <input
                                type="text"
                                class="form-control"
                                name="nama_jenis"
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