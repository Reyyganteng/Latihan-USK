@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="hero">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7">

                    <h1 class="display-4 fw-bold">
                        Katalog UMKM Siswa SMK
                    </h1>

                    <p class="lead mt-3">
                        Temukan berbagai produk kreatif hasil karya
                        dan usaha siswa SMK.
                    </p>

                    <a href="{{ route('products.index') }}" class="btn btn-light btn-lg mt-3">
                        Lihat Katalog
                    </a>

                </div>

            </div>
        </div>
    </section>


    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2>Produk Pilihan</h2>

                <p class="text-muted">
                    Beberapa produk yang tersedia di katalog kami.
                </p>

            </div>


            <div class="row g-4">

                @foreach ($products as $product)
                    <div class="col-md-6 col-lg-3">

                        <div class="card product-card">

                            @if ($product->gambar)
                                <img src="{{ asset($product->gambar) }}" class="product-image" alt="{{ $product->nama }}">
                            @else
                                <div class="product-image bg-secondary"></div>
                            @endif

                            <div class="card-body">

                                <h5 class="card-title">
                                    {{ $product->nama }}
                                </h5>

                                <p class="text-muted">
                                    {{ $product->kategori }}
                                </p>

                                <p class="price">
                                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                                </p>

                                <a href="{{ route('products.show', $product) }}" class="btn btn-dark w-100">
                                    Detail
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

@endsection
