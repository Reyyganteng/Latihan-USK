@extends('layouts.app')

@section('title', $product->nama)

@section('content')

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-md-6">

                @if ($product->gambar)
                    <img src="{{ asset($product->gambar) }}" class="product-image" alt="{{ $product->nama }}">
                @else
                    <div class="product-image bg-secondary"></div>
                @endif

            </div>


            <div class="col-md-6">

                <span class="badge bg-dark">
                    {{ $product->kode }}
                </span>

                <h1 class="mt-3">
                    {{ $product->nama }}
                </h1>

                <p class="text-muted">
                    Kategori: {{ $product->kategori }}
                </p>

                <h3 class="price">
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </h3>

                <p>
                    Stok tersedia:
                    <strong>{{ $product->stok }}</strong>
                </p>

                <hr>

                <h5>Deskripsi</h5>

                <p>
                    {{ $product->deskripsi }}
                </p>

                <a href="{{ route('products.index') }}" class="btn btn-dark">
                    Kembali ke Katalog
                </a>

            </div>

        </div>

    </div>

@endsection
