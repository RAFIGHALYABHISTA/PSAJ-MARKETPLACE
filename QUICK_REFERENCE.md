# 🚀 Quick Reference - Views & Components Structure

## 📋 Struktur Folder Saat Ini

```
resources/
└── views/
    ├── layouts/
    │   ├── app.blade.php          ← Layout utama (navbar + footer)
    │   └── customer.blade.php      ← Layout untuk halaman customer
    │
    ├── components/
    │   ├── navbar.blade.php
    │   ├── footer.blade.php
    │   ├── card.blade.php
    │   ├── button.blade.php
    │   ├── input.blade.php
    │   └── customer/
    │       └── card.blade.php
    │
    ├── pages/
    │   ├── welcome.blade.php       ← Homepage (public)
    │   └── customer/               ← Customer specific pages
    │
    └── customer/
        ├── home.blade.php          ← Customer home (sudah updated)
        ├── produk.blade.php
        ├── login.blade.php
        ├── regis.blade.php
        └── keranjang.blade.php
```

## ✨ Contoh Penggunaan

### 1️⃣ Halaman Sederhana (menggunakan layout app)

```blade
@extends('layouts.app')

@section('title', 'Halaman Saya')

@section('content')
    <h1>Selamat Datang</h1>
    <p>Konten halaman</p>
@endsection
```

### 2️⃣ Halaman Customer (menggunakan layout customer)

```blade
@extends('layouts.customer')

@section('title', 'Customer Home')

@section('content')
    <!-- Konten customer -->
@endsection
```

### 3️⃣ Menggunakan Component

#### Cara 1: Include (untuk backward compatibility)

```blade
@include('components.navbar')
@include('components.footer')
```

#### Cara 2: Laravel Components (recommended)

```blade
<x-button>Klik Saya</x-button>
<x-button variant="danger">Hapus</x-button>
<x-customer.card :customer="$user" :show-delete="true" />
```

### 4️⃣ Component Reusable

```blade
{{-- resources/views/components/button.blade.php --}}
@props(['variant' => 'primary', 'size' => 'md'])

<button {{ $attributes->merge(['class' => 'btn btn-' . $variant . ' btn-' . $size]) }}>
    {{ $slot }}
</button>
```

Penggunaan:

```blade
<x-button>Default Button</x-button>
<x-button variant="danger" size="lg">Delete</x-button>
<x-button variant="secondary" size="sm" onclick="alert('test')">Small</x-button>
```

## 🔄 Migrasi Customer Pages

### Status Sekarang

- ✅ `customer/home.blade.php` - Sudah menggunakan layout customer
- ⏳ `customer/produk.blade.php` - Siap di-update
- ⏳ `customer/login.blade.php` - Siap di-update
- ⏳ `customer/regis.blade.php` - Siap di-update
- ⏳ `customer/keranjang.blade.php` - Siap di-update

### Langkah Update Halaman Customer

1. **Ganti HTML head dan navbar**

    ```blade
    @extends('layouts.customer')
    @section('title', 'Judul Halaman')
    @section('content')
    ```

2. **Hapus footer HTML di akhir file**

    ```blade
    @endsection
    ```

3. **Layout otomatis menambahkan:**
    - Meta tags
    - Tailwind CSS
    - Navbar dengan menu
    - Footer dengan social media
    - Profile sidebar

## 🎨 Tailwind Utility Classes

### Background

```blade
bg-white dark:bg-gray-900
bg-stone-100
bg-gradient-to-r from-yellow-600 to-yellow-800
```

### Spacing

```blade
p-6 (padding all)
px-4 (padding horizontal)
py-2 (padding vertical)
mb-4 (margin-bottom)
gap-3 (flex gap)
```

### Text

```blade
text-lg text-gray-700 dark:text-gray-300
font-semibold font-medium
text-center
leading-relaxed
```

### Responsive

```blade
hidden md:flex (flex on medium+ screens)
grid-cols-1 md:grid-cols-3 (responsive grid)
pt-16 md:pt-20 (responsive padding)
```

## 📝 Rules & Best Practices

1. **File Naming**
    - Files: kebab-case (`my-component.blade.php`)
    - Components: automatically scoped (`<x-my-component />`)

2. **Folder Organization**
    - Group related components dalam subfolder
    - Customer components → `components/customer/`
    - Product components → `components/product/`

3. **Props Definition**
    - Selalu gunakan `@props` di awal component
    - Document default values

4. **Attributes Merging**
    - Gunakan `{{ $attributes->merge(...) }}` untuk class flexibility
    - Contoh: `<x-button class="custom-class" />` masih berfungsi

5. **Slot Usage**
    - `{{ $slot }}` untuk content default
    - `{{ $namedSlot ?? '' }}` untuk optional slots

## 🔧 Environment Setup

### Development

```bash
npm install
npm run dev
php artisan serve
```

### Production

```bash
npm run build
php artisan migrate
```

## 📚 Dokumentasi Lengkap

Lihat file `VIEWS_COMPONENTS_GUIDE.md` untuk dokumentasi detail dan contoh penggunaan lebih lanjut.

---

**Last Updated:** March 2, 2026
**Maintained by:** Development Team
