# Setup & Installation Guide - PSAJ Marketplace

## 📋 Prerequisites

- PHP 8.2+
- Composer
- Node.js & NPM
- Database (Supabase PostgreSQL atau MySQL)

## 🚀 Installation Steps

### 1. Clone Repository & Install Dependencies

```bash
cd d:\laragon\www\PSAJ-MARKETPLACE

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Build assets
npm run build
```

### 2. Setup Environment File

```bash
# Copy .env.example ke .env
cp .env.example .env

# Generate APP_KEY
php artisan key:generate
```

### 3. Configure Database (Supabase/MySQL)

Edit `.env` file dan sesuaikan database credentials:

```env
DB_CONNECTION=pgsql  # untuk Supabase (atau mysql)
DB_HOST=your-supabase-host.supabase.co
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=your-password
```

### 4. Run Database Migrations

```bash
php artisan migrate
```

### 5. Seed Default Admin & Demo Data

```bash
php artisan db:seed
```

## 👤 Default Admin Credentials

Setelah menjalankan seed, Anda bisa login dengan:

**Admin Account:**

- Email: `admin@smega.sch.id`
- Password: `password123`

**Demo Affiliator Accounts:**

1. Budi Santoso - `budi@smega.sch.id` / `password123`
2. Siti Nurhaliza - `siti@smega.sch.id` / `password123`
3. Ahmad Wijaya - `ahmad@smega.sch.id` / `password123`

## 🏃 Run Development Server

```bash
# Terminal 1 - Run Laravel Server
php artisan serve

# Terminal 2 - Run Vite Dev Server (untuk auto-reload assets)
npm run dev
```

Aplikasi akan berjalan di: `http://localhost:8000`

## 📦 Data yang Ter-Seed

### Users (3 Affiliator + Admin)

- 1 Admin User
- 3 Demo Affiliator Users

### Products (4 Produk Sariayu)

- Sabun Mandi - Rp 25.000
- Shampo - Rp 35.000
- Pelembab Wajah - Rp 45.000
- Masker Wajah - Rp 55.000

### Demo Order

- 1 Order sample untuk testing

## 🔧 Fresh Migration & Reseed

Jika ingin reset database dan start fresh:

```bash
# Hapus semua table dan jalankan ulang migrations
php artisan migrate:fresh

# Seed dengan data default
php artisan db:seed
```

**⚠️ Warning:** Command ini akan menghapus SEMUA data yang sudah ada!

## 📝 Important Notes

✅ Semua akun menggunakan password default `password123`
✅ Data products menggunakan placeholder images
✅ Seeder hanya membuat data jika belum ada (tidak duplicate)
✅ Email verified_at sudah di-set untuk semua user

Ganti password setelah login pertama kali untuk keamanan!

## 🆘 Troubleshooting

**Error: SQLSTATE[HY000]: General error**
→ Pastikan database connection sudah benar di `.env`

**Error: Class not found**
→ Jalankan `composer dump-autoload`

**Seeding tidak jalan**
→ Jalankan `php artisan migrate` dulu sebelum `db:seed`
