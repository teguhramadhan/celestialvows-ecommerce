# 🛍️ Simple E-Commerce Project (Single Store)

This is a simple single-store e-commerce project built with **Laravel 12** and **TailwindCSS**.  
Currently under development, it focuses on **multi-role authentication** for Admin and User.

---

## 🚀 Features (In Progress)

- ✅ User and Admin authentication  
- ✅ Login & registration with form validation  
- ✅ Responsive UI using TailwindCSS  
- ✅ Admin dashboard with welcome message  
- ✅ Role-based navigation (Login / Logout button visibility)  
- ⏳ Product management (coming soon)  
- ⏳ Order checkout and history (coming soon)  

---

## 🧑‍💻 Tech Stack

- [Laravel 12](https://laravel.com/)  
- [TailwindCSS](https://tailwindcss.com/)  
- Laravel Breeze (for authentication scaffolding, customized)  
- Blade Templates (simple, non-modularized)  

---

## 📂 Folder Structure (Highlights)

- `resources/views/` — Blade views for frontend pages  
- `routes/web.php` — Main route definitions  
- `app/Http/Middleware/` — Role-based middleware  
- `app/Models/User.php` — User model with role management  

---

📝 #Setup Instructions

# 1. Clone the repo
```bash
git clone https://github.com/your-username/celestialvows-ecommerce.git
```

# 2. Install dependencies
```bash
composer install
npm install && npm run dev
```

# 3. Setup environment
```bash
cp .env.example .env
php artisan key:generate
```

# 4. Run migrations
```bash
php artisan migrate
```

# 5. Serve the app
```bash
php artisan serve
```
