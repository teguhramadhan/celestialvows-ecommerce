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
