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

<body class="font-sans antialiased">

    <!-- Page Content -->
    <main>
        <div class="min-h-screen bg-gradient-to-b from-[#0e0e10] to-[#1c1c1f] text-white flex flex-col">

            {{-- Modulat Section --}}
            <x-customer.navbar />
            <x-customer.hero />
            <x-customer.featuresproduct />
            <x-customer.whychooseus />
            <x-customer.testimonials />
            <x-customer.ctahome />
            <x-customer.footer />
            <x-customer.btnbacktotop />
    </main>


    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
