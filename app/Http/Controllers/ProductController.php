<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Nama produk harus diisi',
            'name.min' => 'Nama produk minimal 3 karakter',
            'price.required' => 'Harga produk harus diisi',
            'price.integer' => 'Harga harus berupa angka',
        ]);

        Product::create($request->only(['name', 'price', 'description']));

        return redirect('/admin/products')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Nama produk harus diisi',
            'name.min' => 'Nama produk minimal 3 karakter',
            'price.required' => 'Harga produk harus diisi',
            'price.integer' => 'Harga harus berupa angka',
        ]);

        $product->update($request->only(['name', 'price', 'description']));

        return redirect('/admin/products')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/products')->with('success', 'Produk berhasil dihapus!');
    }
}
