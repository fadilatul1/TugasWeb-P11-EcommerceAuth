# 🛒 E-Commerce Auth — Tugas Web 11

Aplikasi e-commerce berbasis **Laravel** dengan fitur autentikasi, multi-role, manajemen produk, pemesanan, review, dan dashboard admin menggunakan **Filament**.

## 🚀 Teknologi

* Laravel 12
* PHP 8.2
* MySQL
* Laravel Breeze
* Filament 5
* Tailwind CSS
* Vite
* Eloquent ORM

## 📌 Fitur Utama

### Database & Eloquent

* 7 tabel utama:

  * users
  * categories
  * products
  * orders
  * order_items
  * addresses
  * reviews
* Foreign Key dan relasi antar tabel
* Factory & Seeder
* 60 data produk
* Eloquent Relationships
* Eloquent Scope
* Eager Loading

### 🔐 Authentication & Authorization

* Register
* Login
* Logout
* Multi-role:

  * Admin
  * Editor
  * User
* Role Middleware
* Product Policy
* Pembatasan akses edit dan delete berdasarkan role

### 🖥️ Filament Admin Panel

Dashboard admin tersedia melalui:

`/admin`

Resource yang tersedia:

* Products
* Categories
* Users
* Orders
* Reviews
* Addresses

Dashboard dilengkapi statistik:

* Total Produk
* Total Kategori
* Total Pengguna
* Total Pesanan

## 👤 Akun Demo

### Admin

* Email: `admin@ecommerce.test`
* Password: `password`

### Editor

* Email: `editor@ecommerce.test`
* Password: `password`

### User

Gunakan akun yang dibuat melalui halaman register.

## 🗄️ Instalasi

Clone repository:

```bash
git clone https://github.com/fadilatul1/TugasWeb-P11-EcommerceAuth.git
cd TugasWeb-P11-EcommerceAuth
```

Install dependency:

```bash
composer install
npm install
```

Salin file environment:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Atur database pada `.env`, kemudian jalankan:

```bash
php artisan migrate:fresh --seed
```

Build frontend:

```bash
npm run build
```

Jalankan aplikasi:

```bash
php artisan serve
```

## 🔎 Contoh Query Tinker

Beberapa query Eloquent yang digunakan:

```php
App\Models\Product::select('id', 'name', 'price')->take(5)->get();
```

```php
App\Models\Product::active()
    ->select('id', 'name', 'price')
    ->take(5)
    ->get();
```

```php
App\Models\Product::with('category')
    ->select('id', 'category_id', 'name', 'price')
    ->take(5)
    ->get();
```

```php
App\Models\Category::with('products')
    ->first()
    ->products
    ->take(5);
```

```php
App\Models\User::with(['addresses', 'orders', 'reviews'])->first();
```

## 🎯 Bonus

* Filament Admin Panel
* Dashboard Statistics Widget
* Eager Loading
* Responsive UI
* Product management
* Category management
* User management
* Order management
* Review management
* Address management

## 👩‍💻 Author

**Fadilatul Nayara**

Tugas Web Programming — Universitas Negeri Medan
