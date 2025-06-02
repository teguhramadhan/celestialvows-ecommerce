<section class="py-12 px-6 bg-white">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Produk Unggulan</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach (range(1, 6) as $i)
                <div class="bg-gray-100 rounded-xl shadow p-4 transition hover:scale-105 hover:shadow-lg">
                    <img src="https://source.unsplash.com/400x300/?fashion,man,{{ $i }}"
                        alt="Produk {{ $i }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Produk {{ $i }}</h3>
                    <p class="text-[#d4af37] font-bold mt-2">Rp {{ number_format($i * 150000, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
