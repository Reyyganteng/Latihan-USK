@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <h2 class="mb-4">
                            Edit Produk
                        </h2>


                        @if ($errors->any())

                            <div class="alert alert-danger">

                                <ul class="mb-0">

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <form action="{{ route('admin.products.update', $product) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            @method('PUT')


                            <div class="mb-3">

                                <label class="form-label">
                                    Kode Produk
                                </label>

                                <input type="text" name="kode" class="form-control"
                                    value="{{ old('kode', $product->kode) }}">

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Nama Produk
                                </label>

                                <input type="text" name="nama" class="form-control"
                                    value="{{ old('nama', $product->nama) }}">

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Kategori
                                </label>

                                <input type="text" name="kategori" class="form-control"
                                    value="{{ old('kategori', $product->kategori) }}">

                            </div>


                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Harga
                                    </label>

                                    <input type="number" name="harga" class="form-control"
                                        value="{{ old('harga', $product->harga) }}">

                                </div>


                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Stok
                                    </label>

                                    <input type="number" name="stok" class="form-control"
                                        value="{{ old('stok', $product->stok) }}">

                                </div>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Deskripsi
                                </label>

                                <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $product->deskripsi) }}</textarea>

                            </div>


                            <div class="mb-4">

                                <label class="form-label">
                                    Ganti Gambar
                                </label>

                                <input type="file" name="gambar" class="form-control">

                            </div>


                            <button class="btn btn-dark">
                                Update Produk
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
