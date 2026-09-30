<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // KATALOG
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::query()
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('products.index', compact('products', 'search'));
    }

    // ADMIN
    public function adminIndex(Request $request)
    {
        $search = $request->search;

        $products = Product::query()
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('admin.products.index', compact('products', 'search'));
    }

    // CREATE
    public function create()
    {
        return view('admin.products.create');
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:products,kode',
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'kode.required' => 'Kode produk wajib diisi.',
            'kode.unique' => 'Kode produk sudah digunakan.',
            'nama.required' => 'Nama produk wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.integer' => 'Stok harus berupa angka bulat.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
        ]);

        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();

            $request->file('gambar')->move(
                public_path('images'),
                $filename
            );

            $validated['gambar'] = 'images/' . $filename;
        }

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    // SHOW
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // EDIT
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // UPDATE

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:products,kode,' . $product->id,
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $filename = time() . '_' . $request->file('gambar')->getClientOriginalName();

            $request->file('gambar')->move(
                public_path('images'),
                $filename
            );

            $validated['gambar'] = 'images/' . $filename;
        }

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diubah.');
    }

    // =========================
    // DELETE
    // =========================
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
