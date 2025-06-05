<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Menampilkan daftar semua produk
    public function index()
    {
        $products = Product::with(['variants', 'images'])->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // Menyimpan data produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'variants' => 'required|array|min:1',
            'variants.*.size' => 'required|string',
            'variants.*.color' => 'required|string',
            'variants.*.stock' => 'required|integer|min:0',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        if ($request->filled('variants')) {
            foreach ($request->variants as $variant) {
                $product->variants()->create([
                    'size' => $variant['size'],
                    'color' => $variant['color'],
                    'stock' => $variant['stock'],
                ]);
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product-images', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    // Menampilkan form edit untuk produk tertentu
    public function edit(Product $product)
    {
        $product->load(['variants', 'images']);
        return view('admin.products.edit', compact('product'));
    }

    // Menyimpan perubahan data produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'variants' => 'required|array|min:1',
            'variants.*.size' => 'required|string',
            'variants.*.color' => 'required|string',
            'variants.*.stock' => 'required|integer|min:0',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Hapus varian lama dan buat ulang
        $product->variants()->delete();
        if ($request->filled('variants')) {
            foreach ($request->variants as $variant) {
                $product->variants()->create([
                    'size' => $variant['size'],
                    'color' => $variant['color'],
                    'stock' => $variant['stock'],
                ]);
            }
        }

        // Hapus gambar lama jika ada yang baru diunggah
        if ($request->hasFile('images')) {
            foreach ($product->images as $img) {
                Storage::disk('public')->delete($img->image_path);
                $img->delete();
            }
            foreach ($request->file('images') as $image) {
                $path = $image->store('product-images', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    // Menghapus produk dari database
    public function destroy(Product $product)
    {
        // Hapus gambar dari storage
        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }

        // Hapus produk
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
