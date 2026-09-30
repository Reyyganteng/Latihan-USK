@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <h2 class="mb-4">
                            Tambah Produk
                        </h2>


                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <strong>
                                    Periksa kembali input berikut:
                                </strong>

                                <ul class="mb-0 mt-2">

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf


                            <div class="mb-3">

                                <label class="form-label">
                                    Kode Produk
                                </label>

                                <input type="text" name="kode" class="form-control" value="{{ old('kode') }}"
                                    placeholder="Contoh: P009">

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Nama Produk
                                </label>

                                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Kategori
                                </label>

                                <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}">

                            </div>


                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Harga
                                    </label>

                                    <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Stok
                                    </label>

                                    <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">

                                </div>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Deskripsi
                                </label>

                                <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>

                            </div>


                            <div class="mb-4">

                                <label class="form-label">
                                    Gambar
                                </label>

                                <input type="file" name="gambar" class="form-control">

                            </div>


                            <button class="btn btn-dark">
                                Simpan Produk
                            </button>

                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
