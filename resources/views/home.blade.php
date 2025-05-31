<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beranda - TokoKita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <div class="text-xl font-bold text-emerald-600">TokoKita</div>

        <div class="flex items-center gap-4">
            @auth
                <span class="text-sm text-gray-700">
                    Halo, <span class="text-emerald-600 font-semibold">{{ Auth::user()->name }}</span> 👋
                </span>

                <!-- Tombol Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-sm bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            @else
                <span class="text-sm text-gray-500">
                    Selamat datang di TokoKita!
                </span>
                <a href="{{ route('login') }}"
                    class="bg-emerald-600 text-white text-sm px-4 py-2 rounded hover:bg-emerald-700 transition">
                    Login
                </a>
            @endauth
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-emerald-100 py-20 text-center">
        <h1 class="text-4xl font-bold text-emerald-800">Belanja Mudah & Nyaman</h1>
        <p class="mt-4 text-gray-700">Temukan berbagai produk pilihan terbaik untuk kebutuhan kamu.</p>
        <div class="mt-6">
            <a href="#"
                class="bg-emerald-600 text-white px-6 py-2 rounded-lg shadow hover:bg-emerald-700 transition">
                Jelajahi Produk
            </a>
        </div>
    </section>

    <!-- Produk Preview -->
    <section class="py-12 px-6 max-w-6xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6">Produk Unggulan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @for ($i = 1; $i <= 3; $i++)
                <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition">
                    <div class="h-40 bg-gray-200 rounded mb-4"></div>
                    <h3 class="text-lg font-semibold">Produk {{ $i }}</h3>
                    <p class="text-gray-500 text-sm mt-1">Deskripsi singkat produk {{ $i }}.</p>
                    <p class="mt-2 font-bold text-emerald-600">Rp{{ number_format($i * 50000, 0, ',', '.') }}</p>
                    <button
                        class="mt-3 bg-emerald-600 text-white w-full py-2 rounded hover:bg-emerald-700">Beli</button>
                </div>
            @endfor
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-center text-gray-500 text-sm py-4">
        &copy; {{ date('Y') }} TokoKita. Semua hak dilindungi.
    </footer>

</body>

</html>
