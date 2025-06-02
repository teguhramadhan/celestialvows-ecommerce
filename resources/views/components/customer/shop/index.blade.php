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

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($products as $product)
                    <div class="bg-white text-gray-900 rounded-lg shadow p-4 hover:shadow-lg transition">
                        <h2 class="text-lg font-semibold mb-1">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-600 mb-2">
                            {{ \Illuminate\Support\Str::limit($product->description, 60) }}</p>
                        <p class="text-blue-600 font-bold mb-2">Rp{{ number_format($product->price) }}</p>
                        <a href="#" class="inline-block bg-blue-600 text-white px-3 py-1 rounded text-sm">Lihat
                            Detail</a>
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
