<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction - Celestial Vows</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gradient-to-b from-[#0e0e10] to-[#1c1c1f] text-white">

    <x-customer.navbar />
    <div class="h-screen flex flex-col justify-center items-center text-center space-y-6">
        <h1 class="text-5xl md:text-6xl font-bold text-[#d4af37] font-[Orbitron] animate-pulse">
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

</body>

</html>
