@csrf

<div class="mb-4">
    <label class="block mb-1 font-semibold">Nama Produk</label>
    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
        class="w-full border rounded px-3 py-2" required>
</div>

<div class="mb-4">
    <label class="block font-semibold">Deskripsi</label>
    <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block font-semibold">Harga</label>
    <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}"
        class="w-full border p-2 rounded" required>
</div>

<div class="mb-4">
    <label class="block font-semibold">Varian Produk</label>
    <div id="variant-container">
        @if (old('variants', $product->variants ?? []))
            @foreach (old('variants', $product->variants ?? []) as $i => $variant)
                <div class="flex gap-2 mb-2">
                    <input type="text" name="variants[{{ $i }}][size]" placeholder="Ukuran"
                        value="{{ $variant['size'] ?? $variant->size }}" class="border p-2 rounded w-1/3" required>
                    <input type="text" name="variants[{{ $i }}][color]" placeholder="Warna"
                        value="{{ $variant['color'] ?? $variant->color }}" class="border p-2 rounded w-1/3" required>
                    <input type="number" name="variants[{{ $i }}][stock]" placeholder="Stok"
                        value="{{ $variant['stock'] ?? $variant->stock }}" class="border p-2 rounded w-1/3" required>
                </div>
            @endforeach
        @endif
    </div>
    <button type="button" id="add-variant" class="mt-2 px-4 py-1 bg-gray-300 rounded">+ Tambah Varian</button>
</div>

<div class="mb-4">
    <label class="block font-semibold">Gambar Produk</label>
    <input type="file" name="images[]" multiple class="block w-full border p-2 rounded">
    @if (isset($product))
        <div class="mt-2 flex flex-wrap gap-2">
            @foreach ($product->images as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}" class="w-16 h-16 object-cover">
            @endforeach
        </div>
    @endif
</div>

<button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>

<script>
    let index = {{ isset($product->variants) ? count($product->variants) : 0 }};
    document.getElementById('add-variant').addEventListener('click', function() {
        const container = document.getElementById('variant-container');
        const html = `
      <div class="flex gap-2 mb-2">
        <input type="text" name="variants[${index}][size]" placeholder="Ukuran" class="border p-2 rounded w-1/3" required>
        <input type="text" name="variants[${index}][color]" placeholder="Warna" class="border p-2 rounded w-1/3" required>
        <input type="number" name="variants[${index}][stock]" placeholder="Stok" class="border p-2 rounded w-1/3" required>
      </div>
    `;
        container.insertAdjacentHTML('beforeend', html);
        index++;
    });
</script>
