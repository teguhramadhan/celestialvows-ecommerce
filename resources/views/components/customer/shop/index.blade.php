<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shop') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-950 text-white">

    <main>
        {{-- Navbar --}}
        <x-customer.navbar />

        {{-- Shop Section --}}
        <div class="container h-screen max-w-7xl mx-auto px-4 pt-6 pb-10">
            <h1 class="text-3xl font-bold mb-6 text-center">Shop</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($products as $product)
                    <div
                        class="bg-white text-gray-900 rounded-xl shadow-lg overflow-hidden flex flex-col h-full transition duration-300">
                        {{-- Gambar --}}
                        @if ($product->images->isNotEmpty())
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-56 object-cover transition duration-300 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition rounded-t-xl">
                                </div>
                            </div>
                        @else
                            <div class="w-full h-56 bg-gray-100 flex items-center justify-center text-gray-400">
                                Tidak ada gambar
                            </div>
                        @endif

                        {{-- Konten --}}
                        <div class="flex-1 flex flex-col justify-between p-5">
                            <div>
                                <h2 class="text-xl font-semibold truncate mb-1">{{ $product->name }}</h2>
                                <p class="text-sm text-gray-600 mb-3">
                                    {{ \Illuminate\Support\Str::limit($product->description, 60) }}
                                </p>
                                <p class="text-amber-600 font-bold text-lg mb-3">
                                    Rp{{ number_format($product->price) }}
                                </p>

                                {{-- Ukuran dan stok --}}
                                <div class="mb-3">
                                    <p class="text-sm font-medium text-gray-800 mb-2">Pilih Ukuran:</p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($product->variants as $variant)
                                            <label class="relative group">
                                                <input type="radio" name="size_{{ $product->id }}"
                                                    value="{{ $variant->size }}" class="sr-only peer">
                                                <div
                                                    class="px-3 py-1.5 rounded border border-gray-400 text-sm cursor-pointer
                                                peer-checked:bg-amber-500 peer-checked:text-white
                                                hover:border-amber-500 transition">
                                                    {{ $variant->size }}
                                                </div>
                                                <div
                                                    class="absolute bottom-full mb-1 left-1/2 -translate-x-1/2 opacity-0 group-hover:opacity-100
                                                bg-gray-800 text-white text-xs rounded px-2 py-1 whitespace-nowrap z-10">
                                                    Stok: {{ $variant->stock }}
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{-- Tombol Aksi --}}
                            <div class="mt-4 flex items-center justify-between gap-2">
                                <a href="#"
                                    class="flex-1 text-center bg-amber-500 hover:bg-amber-600 text-white font-medium py-2 rounded transition">
                                    Detail
                                </a>
                                <a href="#"
                                    class="flex-1 text-center bg-green-600 hover:bg-green-700 text-white font-medium py-2 rounded transition">
                                    Beli
                                </a>
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 p-2 rounded transition"
                                    title="Tambah ke Keranjang">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.2 6m0 0a1 1 0 001 1h12a1 1 0 001-1m-14 0h14" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center col-span-4 text-gray-400">Tidak ada produk tersedia.</p>
                @endforelse
            </div>



            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>

        {{-- Footer & Back to Top --}}
        <x-customer.footer />
        <x-customer.btnbacktotop />
    </main>

    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/features-product.js') }}"></script>
</body>

</html>
