//script button floating dan fixed back to top
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
        behavior: "smooth",
    });
});

// Script Features Products & overlay dan hover animation
const products = [
    {
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
            (currentPage === i
                ? "bg-[#d4af37] text-[#1c1c1f]"
                : "bg-transparent");
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

// Script Why Choose Use Animation
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

// Script Testimonials Animation
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

// Script Navbar responsive

const menuToggle = document.getElementById("menu-toggle");
const mobileMenu = document.getElementById("mobile-menu");
const mobilePanel = document.getElementById("mobile-menu-panel");
const closeMenu = document.getElementById("close-menu");

menuToggle.addEventListener("click", () => {
    mobileMenu.classList.remove("hidden");
    setTimeout(() => {
        mobilePanel.classList.remove("translate-x-full");
        mobilePanel.classList.add("translate-x-0");
    }, 10);
});

closeMenu.addEventListener("click", () => {
    mobilePanel.classList.remove("translate-x-0");
    mobilePanel.classList.add("translate-x-full");
    setTimeout(() => {
        mobileMenu.classList.add("hidden");
    }, 300); // after transition
});

// Optional: click outside panel to close
mobileMenu.addEventListener("click", (e) => {
    if (e.target === mobileMenu) {
        closeMenu.click();
    }
});
