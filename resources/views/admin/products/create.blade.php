<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Tambah Produk</h2>

        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium">Nama Produk</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium">Deskripsi</label>
                <textarea name="description" id="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium">Harga</label>
                <input type="number" name="price" id="price" class="w-full border rounded px-3 py-2"
                    value="{{ old('price') }}">
                @error('price')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium">Stok</label>
                <input type="number" name="stock" id="stock" class="w-full border rounded px-3 py-2"
                    value="{{ old('stock') }}">
                @error('stock')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:underline">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
