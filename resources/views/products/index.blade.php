@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')

    <div class="container py-5">

        <div class="mb-4">

            <h1>Katalog Produk</h1>

            <p class="text-muted">
                Temukan produk yang kamu butuhkan.
            </p>

        </div>


        <form action="{{ route('products.index') }}" method="GET" class="mb-5">

            <div class="input-group">

                <input type="text" name="search" class="form-control" placeholder="Cari nama atau kategori..."
                    value="{{ $search }}">

                <button class="btn btn-dark">
                    Cari
                </button>

            </div>

        </form>


        <div class="row g-4">

            @forelse($products as $product)
                <div class="col-md-6 col-lg-3">

                    <div class="card product-card">

                        @if ($product->gambar)
                            <img src="{{ asset($product->gambar) }}" class="product-image" alt="{{ $product->nama }}">
                        @else
                            <div class="product-image bg-secondary"></div>
                        @endif


                        <div class="card-body">

                            <small class="text-muted">
                                {{ $product->kode }}
                            </small>

                            <h5 class="mt-2">
                                {{ $product->nama }}
                            </h5>

                            <p class="mb-1">
                                {{ $product->kategori }}
                            </p>

                            <p class="price">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </p>

                            <p>
                                Stok: {{ $product->stok }}
                            </p>

                            <a href="{{ route('products.show', $product) }}" class="btn btn-dark w-100">
                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-warning">
                        Produk tidak ditemukan.
                    </div>

                </div>
            @endforelse

        </div>


        <div class="mt-5">
            {{ $products->links() }}
        </div>

    </div>

@endsection
