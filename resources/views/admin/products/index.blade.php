<x-app-layout>
    <div class="container max-w-7xl mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar Produk</h1>
            <a href="{{ route('admin.products.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Produk</a>
        </div>

        <table class="w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-100">
                <tr class="text-left">
                    <th class="p-3">Nama</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Varian</th>
                    <th class="p-3">Gambar</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-t">
                        <td class="p-3">{{ $product->name }}</td>
                        <td class="p-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="p-3">
                            @foreach ($product->variants as $variant)
                                <div class="text-sm">Uk: {{ $variant->size }}, Warna: {{ $variant->color }}, Stok:
                                    {{ $variant->stock }}</div>
                            @endforeach
                        </td>
                        <td class="p-3">
                            @foreach ($product->images as $image)
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gambar Produk"
                                    width="100">
                            @endforeach

                        </td>
                        <td class="p-3 space-x-2">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
