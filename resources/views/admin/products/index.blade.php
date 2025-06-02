<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Produk</h1>
            <a href="{{ route('admin.products.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Tambah Produk</a>
        </div>
        <div class="bg-white w-full flex flex-col justify-center items-center py-12 mt-6 rounded shadow">
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white rounded shadow">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Harga</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Stok</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp{{ number_format($product->price) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->stock }}</td>
                                <td class="px-6 py-4 whitespace-nowrap flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="text-indigo-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
