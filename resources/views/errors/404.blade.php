<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-customer.navbar />
    <div class="min-h-screen flex flex-col justify-center items-center text-center px-6 bg-gray-100">
        <h1 class="text-6xl font-bold text-[#d4af37] mb-4">404</h1>
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Halaman Tidak Ditemukan</h2>
        <p class="text-gray-600 mb-6">Sepertinya halaman yang kamu cari tidak tersedia atau sudah dipindahkan.</p>
        <a href="{{ route('home') }}"
            class="inline-block bg-[#d4af37] text-white px-6 py-3 rounded-md hover:bg-yellow-600 transition">
            Kembali ke Beranda
        </a>
    </div>
    <x-customer.footer />
</body>

</html>
