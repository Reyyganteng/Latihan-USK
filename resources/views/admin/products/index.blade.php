@extends('layouts.app')

@section('title', 'Admin Produk')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1>Data Produk</h1>
            <p class="text-muted">
                Kelola data produk.
            </p>
        </div>

        <a
            href="{{ route('admin.products.create') }}"
            class="btn btn-dark">
            + Tambah Produk
        </a>

    </div>


    @if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif


    <div class="table-responsive">

        <table class="table table-bordered table-hover bg-white">

            <thead class="table-dark">

                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($products as $product)

                <tr>

                    <td>{{ $product->kode }}</td>

                    <td>{{ $product->nama }}</td>

                    <td>{{ $product->kategori }}</td>

                    <td>
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </td>

                    <td>{{ $product->stok }}</td>

                    <td>

                        <a
                            href="{{ route('admin.products.edit', $product) }}"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>


                        <form
                            action="{{ route('admin.products.destroy', $product) }}"
                            method="POST"
                            class="d-inline">

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center">
                        Belum ada produk.
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection