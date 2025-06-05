<x-app-layout>
    <div class="w-full flex flex-col justify-center items-center">
        <h1 class="text-2xl font-bold mb-4">Tambah Produk Baru</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block font-semibold">Nama Produk</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="border rounded px-3 py-2 w-full" />
                @error('name')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block font-semibold">Deskripsi</label>
                <textarea name="description" id="description" class="border rounded px-3 py-2 w-full">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block font-semibold">Harga</label>
                <input type="number" name="price" id="price" value="{{ old('price') }}" required step="0.01"
                    min="0" class="border rounded px-3 py-2 w-full" />
                @error('price')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-1">Varian Produk</label>
                <div id="variants-container">
                    {{-- Variant pertama --}}
                    <div class="variant-item flex gap-3 mb-3 items-center">
                        <input type="text" name="variants[0][size]" placeholder="Ukuran" required
                            class="border rounded px-3 py-2" />
                        <input type="text" name="variants[0][color]" placeholder="Warna" required
                            class="border rounded px-3 py-2" />
                        <input type="number" name="variants[0][stock]" placeholder="Stock" required min="0"
                            class="border rounded px-3 py-2 w-20" />
                        <button type="button" onclick="removeVariant(this)"
                            class="text-red-600 font-bold px-2 py-1">Hapus</button>
                    </div>
                </div>
                <button type="button" onclick="addVariant()" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Tambah Varian
                </button>
                @error('variants')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="images" class="block font-semibold mb-1">Gambar Produk</label>
                <input type="file" name="images[]" id="images" multiple accept="image/*" />
                @error('images.*')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded font-semibold">
                Simpan Produk
            </button>
        </form>
    </div>

    <script>
        let variantIndex = 1;

        function addVariant() {
            const container = document.getElementById('variants-container');
            const div = document.createElement('div');
            div.classList.add('variant-item', 'flex', 'gap-3', 'mb-3', 'items-center');
            div.innerHTML = `
                <input type="text" name="variants[${variantIndex}][size]" placeholder="Ukuran" required
                    class="border rounded px-3 py-2" />
                <input type="text" name="variants[${variantIndex}][color]" placeholder="Warna" required
                    class="border rounded px-3 py-2" />
                <input type="number" name="variants[${variantIndex}][stock]" placeholder="Stock" required min="0"
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
