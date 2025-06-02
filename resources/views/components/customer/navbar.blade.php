    <!-- Navbar -->
    <header class="bg-[#1c1c1f] shadow-md py-8 w-full z-50">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-[#d4af37]">Celestial Vows</h1>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}"
                    class="text-white hover:text-[#d4af37] transition duration-200 ease-in-out font-medium">
                    Home
                </a>
                <a href="{{ route('shop.index') }}"
                    class="text-white hover:text-[#d4af37] transition duration-200 ease-in-out font-medium">
                    Shop
                </a>

                @auth
                    <span class="text-sm text-gray-300">
                        Hai, <span class="text-emerald-400 font-semibold">{{ Auth::user()->name }}</span> 👋
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="border border-[#d4af37] text-white text-sm px-4 py-2 rounded hover:bg-[#d4af37] transition">
                        Login
                    </a>
                @endauth
            </nav>

            <!-- Mobile Toggle -->
            <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-sm z-40 hidden">
            <div class="absolute right-0 top-0 h-full w-64 bg-[#1c1c1f] transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col p-6 space-y-6 shadow-lg"
                id="mobile-menu-panel">
                <!-- Close Button -->
                <button id="close-menu" class="self-end text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6 4a1 1 0 011.41 0L10 6.59l2.59-2.59a1 1 0 111.41 1.41L11.41 8l2.59 2.59a1 1 0 01-1.41 1.41L10 9.41l-2.59 2.59a1 1 0 01-1.41-1.41L8.59 8 6 5.41A1 1 0 016 4z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Menu Items -->
                <a href="{{ route('home') }}" class="text-white hover:text-[#d4af37] transition text-lg font-medium">
                    Home
                </a>
                <a href="{{ route('shop.index') }}"
                    class="text-white hover:text-[#d4af37] transition text-lg font-medium">
                    Shop
                </a>

                @auth
                    <span class="text-sm text-gray-300 mt-4">
                        Hai, <span class="text-emerald-400 font-semibold">{{ Auth::user()->name }}</span> 👋
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="mt-4 border border-[#d4af37] text-white px-4 py-2 rounded hover:bg-[#d4af37] transition text-center">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </header>
