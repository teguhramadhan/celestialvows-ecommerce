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
