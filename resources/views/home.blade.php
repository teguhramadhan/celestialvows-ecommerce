<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home - Celestial Vows</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- Animation -->
<style>
    .animate-scaleUp {
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.4s ease;
    }

    .animate-scaleUp.visible {
        transform: scale(1);
        opacity: 1;
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        0% {
            opacity: 0;
            transform: translateX(-50px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        0% {
            opacity: 0;
            transform: translateX(50px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .testimonial {
        opacity: 0;
        transform: translateX(0);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .testimonial.slide-in-left {
        animation: slideInLeft 0.6s forwards;
    }

    .testimonial.slide-in-right {
        animation: slideInRight 0.6s forwards;
    }

    .animate-fadeInDown {
        animation: fadeInDown 0.6s ease forwards;
    }
</style>

<body class="bg-[#0e0e10] text-[#f3f4f6] font-sans">
    <!-- Navbar -->
    <header class="bg-[#1c1c1f] shadow-md py-4 fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-[#d4af37]">Celestial Vows</h1>

            <!-- Desktop Nav -->
            <nav class="hidden md:flex space-x-8 items-center">
                @foreach (['Home', 'Shop', 'About', 'Contact'] as $item)
                    <a href="#"
                        class="text-white hover:text-[#d4af37] transition duration-200 ease-in-out font-medium">
                        {{ $item }}
                    </a>
                @endforeach

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
                @foreach (['Home', 'Shop', 'About', 'Contact'] as $item)
                    <a href="#" class="text-white hover:text-[#d4af37] transition text-lg font-medium">
                        {{ $item }}
                    </a>
                @endforeach

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

    <!-- Hero Section -->
    <section id="hero"
        class="relative h-screen flex flex-col justify-center items-center text-center py-24 px-6 bg-gradient-to-b from-[#0e0e10] to-[#1c1c1f] bg-[url('{{ asset('https://images.unsplash.com/photo-1589902860314-e910697dea18?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}')] bg-cover bg-center bg-no-repeat">
        <!-- Overlay -->
        <div class="h-screen absolute inset-0 bg-black bg-opacity-60"></div>

        <h2 class="text-5xl font-extrabold mb-4 leading-tight animate-fadeInUp">
            Redefining Men's Elegance
        </h2>
        <p class="text-[#d4af37] max-w-lg mx-auto mb-8 animate-fadeInUp delay-150">
            Step into a world where masculine sophistication meets timeless
            minimalism.
        </p>
        <a href="#"
            class="bg-[#d4af37] text-[#0e0e10] font-semibold py-3 px-6 rounded-lg hover:bg-yellow-600 transition animate-fadeInUp delay-300">
            Explore the Collection
        </a>
    </section>

    <!-- Featured Products -->
    <section id="FeaturedProducts" class="min-h-screen flex flex-col justify-center items-center bg-[#1c1c1f] py-16">
        <div class="max-w-7xl mx-auto px-6 w-full">
            <h3 class="text-3xl font-semibold text-center mb-10 text-[#d4af37]">
                Featured Products
            </h3>
            <div id="productGrid" class="grid md:grid-cols-3 gap-8 mb-10">
                <!-- Product cards generated by JS -->
            </div>

            <!-- Pagination -->
            <div id="pagination" class="flex justify-center space-x-3 text-[#d4af37]"></div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-20 px-6 bg-[#0e0e10] text-center">
        <h3 class="text-3xl font-semibold mb-12 text-[#d4af37]">
            Why Celestial Vows?
        </h3>
        <div class="max-w-5xl mx-auto grid md:grid-cols-3 gap-12 text-gray-400">
            <!-- Card 1 -->
            <div
                class="bg-[#1c1c1f] p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 cursor-default animate-scaleUp">
                <div class="mb-4 flex justify-center text-[#d4af37] text-5xl" aria-hidden="true">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <h4 class="text-xl font-bold mb-3 text-[#d4af37]">Timeless Design</h4>
                <p class="leading-relaxed">
                    Fashion that never fades. We blend trend with tradition.
                </p>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-[#1c1c1f] p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 cursor-default animate-scaleUp">
                <div class="mb-4 flex justify-center text-[#d4af37] text-5xl" aria-hidden="true">
                    <i class="fas fa-fabric"></i>
                    <!-- Karena FontAwesome tidak ada icon 'fabric', ganti ke icon 'feather-alt' sebagai simbol material ringan -->
                    <i class="fas fa-feather-alt"></i>
                </div>
                <h4 class="text-xl font-bold mb-3 text-[#d4af37]">
                    Premium Materials
                </h4>
                <p class="leading-relaxed">
                    Only the finest fabrics, tested for comfort and class.
                </p>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-[#1c1c1f] p-8 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 cursor-default animate-scaleUp">
                <div class="mb-4 flex justify-center text-[#d4af37] text-5xl" aria-hidden="true">
                    <i class="fas fa-tools"></i>
                </div>
                <h4 class="text-xl font-bold mb-3 text-[#d4af37]">Crafted to Last</h4>
                <p class="leading-relaxed">
                    Stitch by stitch, built with purpose and precision.
                </p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="min-h-[400px] bg-[#1c1c1f] flex flex-col justify-center items-center py-16 px-6 text-center">
        <h3 class="text-3xl font-semibold mb-10">What They Say</h3>
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-8">
            <div class="bg-[#0e0e10] p-6 rounded-xl shadow testimonial">
                <p class="italic text-gray-400 mb-4">
                    "Wearing Celestial Vows feels like stepping into a new level of
                    myself."
                </p>
                <span class="font-semibold text-[#d4af37]">— Adrian M.</span>
            </div>
            <div class="bg-[#0e0e10] p-6 rounded-xl shadow testimonial">
                <p class="italic text-gray-400 mb-4">
                    "The fit, the fabric, the finesse—everything’s just elite."
                </p>
                <span class="font-semibold text-[#d4af37]">— Malik R.</span>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section
        class="relative py-24 px-6 bg-gradient-to-r from-[#b99529] via-[#d4af37] to-[#b99529] text-[#0e0e10] text-center overflow-hidden">
        <h3 class="text-4xl font-extrabold mb-4 animate-fadeInUp">
            Every Detail,
            <span class="underline decoration-[#0e0e10] decoration-4 italic">A Vow</span>
        </h3>
        <p class="mb-8 max-w-2xl mx-auto text-[#1a1a1a] text-lg leading-relaxed animate-fadeInUp delay-150">
            Invest in timeless pieces crafted with precision and passion — elevate
            your presence, embody confidence, and leave a lasting impression
            wherever you go.
        </p>

        <a href="#"
            class="inline-flex items-center gap-3 bg-[#09090b] text-[#f3d96b] font-bold py-4 px-8 rounded-xl shadow-md shadow-black/50 border-2 border-transparent hover:shadow-2xl hover:border-[#f3d96b] hover:bg-[#f3d96b] hover:text-[#09090b] transition-all duration-300 animate-fadeInUp delay-300">
            Discover Signature Looks
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M12 5l7 7-7 7" />
            </svg>
        </a>

        <style>
            @keyframes fadeInUp {
                0% {
                    opacity: 0;
                    transform: translateY(20px);
                }

                100% {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fadeInUp {
                animation: fadeInUp 0.6s ease forwards;
            }

            .delay-150 {
                animation-delay: 0.15s;
            }

            .delay-300 {
                animation-delay: 0.3s;
            }

            .delay-450 {
                animation-delay: 0.45s;
            }
        </style>
    </section>

    <!-- Footer -->
    <footer class="bg-[#1c1c1f] text-gray-400 text-sm">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Branding -->
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold text-[#d4af37] mb-2">Celestial Vows</h2>
                <p class="text-gray-500 italic">Elevate your style, every day.</p>
            </div>

            <!-- Quick Links -->
            <div class="text-center md:text-left lg:text-left">
                <h3 class="font-semibold mb-4 text-white">Quick Links</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="hover:text-[#d4af37] transition">Home</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-[#d4af37] transition">Shop</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-[#d4af37] transition">About Us</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-[#d4af37] transition">Contact</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-[#d4af37] transition">FAQs</a>
                    </li>
                </ul>
            </div>

            <!-- Social Media -->
            <div>
                <h3 class="font-semibold mb-4 text-white text-center md:text-left lg:text-left">
                    Follow Us
                </h3>
                <div class="flex justify-center md:justify-start space-x-4 text-gray-400">
                    <a href="#" aria-label="Facebook" class="hover:text-[#d4af37] transition">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 10-11.5 9.85v-6.97H8.11v-2.88h2.39V9.85c0-2.36 1.4-3.68 3.54-3.68 1.02 0 2.09.18 2.09.18v2.3h-1.18c-1.17 0-1.54.73-1.54 1.48v1.78h2.62l-.42 2.88h-2.2v6.97A10 10 0 0022 12z" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Instagram" class="hover:text-[#d4af37] transition">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm4.75-1.75a1.25 1.25 0 110 2.5 1.25 1.25 0 010-2.5z" />
                        </svg>
                    </a>
                    <a href="#" aria-label="Twitter" class="hover:text-[#d4af37] transition">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M23 3a10.9 10.9 0 01-3.14.86 5.48 5.48 0 002.4-3.03 10.82 10.82 0 01-3.47 1.33 5.44 5.44 0 00-9.27 4.95A15.42 15.42 0 013 4.92 5.44 5.44 0 005.52 11 5.4 5.4 0 012 10.6v.07a5.44 5.44 0 004.37 5.33 5.52 5.52 0 01-2.45.09 5.45 5.45 0 005.08 3.78A10.9 10.9 0 012 19.54 15.34 15.34 0 008.29 21c9.18 0 14.2-7.61 14.2-14.2 0-.22-.01-.43-.02-.64A10.18 10.18 0 0023 3z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="text-center md:text-left">
                <h3 class="font-semibold mb-4 text-white">Newsletter</h3>
                <form class="flex flex-col sm:flex-row gap-3 justify-center md:justify-start"
                    onsubmit="event.preventDefault(); alert('Thank you for subscribing!');">
                    <input type="email" placeholder="Your email address" required
                        class="px-4 py-2 rounded-xl text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#d4af37]" />
                    <button type="submit"
                        class="bg-[#d4af37] text-[#0e0e10] font-bold px-6 py-2 rounded-xl hover:bg-yellow-400 transition">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-4 text-center text-gray-500 text-xs">
            <p>&copy; 2025 Celestial Vows. All rights reserved.</p>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop"
        class="fixed bottom-6 right-6 bg-[#d4af37] text-[#0e0e10] p-3 rounded-full shadow-lg hover:bg-yellow-400 transition-opacity duration-300 opacity-0 pointer-events-none"
        aria-label="Back to Top" title="Back to Top">
        <!-- Icon panah atas -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M12 19V6M5 12l7-7 7 7" />
        </svg>
    </button>

    <!-- script button floating dan fixed back to top -->
    <script>
        // Mendapatkan tombol
        const backToTopBtn = document.getElementById("backToTop");

        // Fungsi untuk toggle tombol saat scroll
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                // Kalau sudah scroll 300px, munculin tombol
                backToTopBtn.classList.remove("opacity-0", "pointer-events-none");
                backToTopBtn.classList.add("opacity-100", "pointer-events-auto");
            } else {
                backToTopBtn.classList.add("opacity-0", "pointer-events-none");
                backToTopBtn.classList.remove("opacity-100", "pointer-events-auto");
            }
        });

        // Fungsi smooth scroll ke atas saat tombol diklik
        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>

    <!-- Script Features Products & overlay dan hover animation -->
    <script>
        const products = [{
                title: "Monarch Blazer",
                price: 180,
                description: "Command the room with timeless confidence.",
                image: "https://images.unsplash.com/photo-1618453292459-53424b66bb6a?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                alt: "Monarch Blazer",
                detailUrl: "#monarch-blazer",
            },
            {
                title: "Orion Shirt",
                price: 80,
                description: "A modern fit for the modern man.",
                image: "https://images.unsplash.com/photo-1621951753015-740c699ab970?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                alt: "Orion Shirt",
                detailUrl: "#orion-shirt",
            },
            {
                title: "Aether Trousers",
                price: 120,
                description: "Tailored excellence for everyday elegance.",
                image: "https://images.unsplash.com/photo-1626543772115-ebd0bb39c6e1?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                alt: "Aether Trousers",
                detailUrl: "#aether-trousers",
            },
            {
                title: "Vega Hoodie",
                price: 95,
                description: "Stay cozy with style that speaks volumes.",
                image: "https://images.unsplash.com/photo-1541099649105-f69ad21f3246?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.1.0",
                alt: "Vega Hoodie",
                detailUrl: "#vega-hoodie",
            },
            {
                title: "Nova Sneakers",
                price: 150,
                description: "Step forward with unmatched comfort.",
                image: "https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.1.0",
                alt: "Nova Sneakers",
                detailUrl: "#nova-sneakers",
            },
            {
                title: "Lunar Belt",
                price: 50,
                description: "The finishing touch that makes a statement.",
                image: "https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.1.0",
                alt: "Lunar Belt",
                detailUrl: "#lunar-belt",
            },
        ];

        const itemsPerPage = 6;
        let currentPage = 1;

        const productGrid = document.getElementById("productGrid");
        const pagination = document.getElementById("pagination");

        function renderProducts(page) {
            productGrid.innerHTML = "";
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedItems = products.slice(start, end);

            paginatedItems.forEach((product) => {
                const card = document.createElement("a");
                card.href = product.detailUrl;
                card.className =
                    "group relative bg-[#0e0e10] rounded-xl overflow-hidden shadow-lg block transition transform hover:scale-105 hover:shadow-2xl cursor-pointer";

                card.innerHTML = `
        <img
          src="${product.image}"
          alt="${product.alt}"
          class="w-full h-[400px] object-cover"
        />
        <div class="p-4">
          <h4 class="text-xl font-semibold mb-2">${product.title}</h4>
          <p class="text-gray-400 mb-4">${product.description}</p>
          <span class="text-[#d4af37] font-bold">$${product.price}</span>
        </div>
        <!-- Hover overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition flex justify-center items-center space-x-2 text-[#d4af37] font-semibold text-lg">
          <span>View Details</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </div>
      `;

                productGrid.appendChild(card);
            });
        }

        function renderPagination() {
            pagination.innerHTML = "";

            const totalPages = Math.ceil(products.length / itemsPerPage);

            const prevBtn = document.createElement("button");
            prevBtn.textContent = "Prev";
            prevBtn.className =
                "px-3 py-1 rounded bg-transparent hover:bg-[#d4af37] hover:text-[#1c1c1f] transition";
            prevBtn.disabled = currentPage === 1;
            prevBtn.onclick = () => {
                if (currentPage > 1) {
                    currentPage--;
                    updateUI();
                }
            };
            pagination.appendChild(prevBtn);

            for (let i = 1; i <= totalPages; i++) {
                const pageBtn = document.createElement("button");
                pageBtn.textContent = i;
                pageBtn.className =
                    "px-3 py-1 rounded border border-[#d4af37] hover:bg-[#d4af37] hover:text-[#1c1c1f] transition " +
                    (currentPage === i ?
                        "bg-[#d4af37] text-[#1c1c1f]" :
                        "bg-transparent");
                pageBtn.onclick = () => {
                    currentPage = i;
                    updateUI();
                };
                pagination.appendChild(pageBtn);
            }

            const nextBtn = document.createElement("button");
            nextBtn.textContent = "Next";
            nextBtn.className =
                "px-3 py-1 rounded bg-transparent hover:bg-[#d4af37] hover:text-[#1c1c1f] transition";
            nextBtn.disabled = currentPage === totalPages;
            nextBtn.onclick = () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    updateUI();
                }
            };
            pagination.appendChild(nextBtn);
        }

        function updateUI() {
            renderProducts(currentPage);
            renderPagination();
        }

        updateUI();
    </script>

    <!-- Script Why Choose Use Animation -->
    <script>
        const cards = document.querySelectorAll(".animate-scaleUp");

        function checkVisibility() {
            const windowBottom = window.innerHeight + window.scrollY;
            cards.forEach((card) => {
                const cardTop = card.offsetTop;
                if (windowBottom > cardTop + 100) {
                    card.classList.add("visible");
                }
            });
        }

        window.addEventListener("scroll", checkVisibility);
        window.addEventListener("load", checkVisibility);
    </script>

    <!-- Script Testimonials Animation -->
    <script>
        const testimonials = document.querySelectorAll(".testimonial");

        function animateTestimonials() {
            const windowBottom = window.innerHeight + window.scrollY;

            testimonials.forEach((testimonial, index) => {
                const testimonialTop = testimonial.offsetTop;

                if (
                    windowBottom > testimonialTop + 100 &&
                    !testimonial.classList.contains("slide-in-left") &&
                    !testimonial.classList.contains("slide-in-right")
                ) {
                    if (index % 2 === 0) {
                        testimonial.classList.add("slide-in-left");
                    } else {
                        testimonial.classList.add("slide-in-right");
                    }
                }
            });
        }

        window.addEventListener("scroll", animateTestimonials);
        window.addEventListener("load", animateTestimonials);
    </script>

    {{-- Script Navbar responsive --}}
    <!-- Script -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobilePanel = document.getElementById('mobile-menu-panel');
        const closeMenu = document.getElementById('close-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobilePanel.classList.remove('translate-x-full');
                mobilePanel.classList.add('translate-x-0');
            }, 10);
        });

        closeMenu.addEventListener('click', () => {
            mobilePanel.classList.remove('translate-x-0');
            mobilePanel.classList.add('translate-x-full');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300); // after transition
        });

        // Optional: click outside panel to close
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                closeMenu.click();
            }
        });
    </script>
</body>

</html>
