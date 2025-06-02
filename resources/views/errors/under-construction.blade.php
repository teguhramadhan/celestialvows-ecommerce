<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <main>
        <x-customer.navbar />
        <div class="h-screen bg-slate-950 flex flex-col justify-center items-center text-center space-y-6">
            <h1 class="text-5xl md:text-6xl font-bold text-[#d4af37] font-[figtree] animate-pulse">
                🚧 Under Construction 🚧
            </h1>
            <p class="text-lg md:text-xl text-gray-300">
                Website Celestial Vows sedang dalam pengembangan.<br>
                Kami akan segera hadir dengan pengalaman yang lebih elegan dan eksklusif.
            </p>
            <a href="{{ route('home') }}"
                class="inline-block mt-4 px-6 py-3 bg-[#d4af37] text-black rounded-lg font-semibold hover:bg-yellow-400 transition">
                Kembali ke Beranda
            </a>
        </div>
        <x-customer.footer />
        <x-customer.btnbacktotop />
    </main>

    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>
