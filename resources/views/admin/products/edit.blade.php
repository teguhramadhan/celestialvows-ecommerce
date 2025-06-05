<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Produk: {{ $product->name }}</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-semibold">Nama Produk</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                class="border rounded px-3 py-2 w-full" />
            @error('name')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block font-semibold">Deskripsi</label>
            <textarea name="description" id="description" class="border rounded px-3 py-2 w-full">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price" class="block font-semibold">Harga</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required
                step="0.01" min="0" class="border rounded px-3 py-2 w-full" />
            @error('price')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Varian Produk</label>
            <div id="variants-container">
                @foreach (old('variants', $product->variants->toArray()) as $i => $variant)
                    <div class="variant-item flex gap-3 mb-3 items-center">
                        <input type="text" name="variants[{{ $i }}][size]" placeholder="Ukuran"
                            value="{{ $variant['size'] }}" required class="border rounded px-3 py-2" />
                        <input type="text" name="variants[{{ $i }}][color]" placeholder="Warna"
                            value="{{ $variant['color'] }}" required class="border rounded px-3 py-2" />
                        <input type="number" name="variants[{{ $i }}][stock]" placeholder="Stock"
                            value="{{ $variant['stock'] }}" required min="0"
                            class="border rounded px-3 py-2 w-20" />
                        <button type="button" onclick="removeVariant(this)"
                            class="text-red-600 font-bold px-2 py-1">Hapus</button>
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addVariant()" class="bg-blue-600 text-white px-4 py-2 rounded">
                Tambah Varian
            </button>
            @error('variants')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-semibold mb-1">Gambar Produk Saat Ini</label>
            <div class="flex gap-4 mb-4">
                @foreach ($product->images as $img)
                    <img src="{{ asset('storage/' . $img->image_path) }}" alt="Gambar Produk"
                        class="w-24 h-24 object-cover rounded border" />
                @endforeach
            </div>
            <label for="images" class="block font-semibold mb-1">Upload Gambar Baru (opsional)</label>
            <input type="file" name="images[]" id="images" multiple accept="image/*" />
            @error('images.*')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded font-semibold">
            Update Produk
        </button>
    </form>

    <script>
        let variantIndex = {{ count(old('variants', $product->variants)) }};

        function addVariant() {
            const container = document.getElementById('variants-container');
            const div = document.createElement('div');
            div.classList.add('variant-item', 'flex', 'gap-3', 'mb-3', 'items-center');
            div.innerHTML = `
                <input type="text" name="variants[\${variantIndex}][size]" placeholder="Ukuran" required
                    class="border rounded px-3 py-2" />
                <input type="text" name="variants[\${variantIndex}][color]" placeholder="Warna" required
                    class="border rounded px-3 py-2" />
                <input type="number" name="variants[\${variantIndex}][stock]" placeholder="Stock" required min="0"
                    class="border rounded px-3 py-2 w-20" />
                <button type="button" onclick="removeVariant(this)"
                    class="text-red-600 font-bold px-2 py-1">Hapus</button>
            `;
            container.appendChild(div);
            variantIndex++;
        }

        function removeVariant(button) {
            const variantDiv = button.parentElement;
            variantDiv.remove();
        }
    </script>
</x-app-layout>
