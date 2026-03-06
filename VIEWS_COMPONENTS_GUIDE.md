# PSAJ Marketplace - Views & Components Guide

## 📁 Struktur Folder

```
resources/views/
├── layouts/
│   └── app.blade.php          # Main layout template (navbar + footer)
│
├── components/
│   ├── navbar.blade.php       # Navigation component
│   ├── footer.blade.php       # Footer component
│   └── customer/              # Customer-related components
│       └── (components go here)
│
└── pages/
    ├── welcome.blade.php      # Home page
    └── customer/
        └── (customer pages go here)
```

## 🚀 Cara Menggunakan

### 1. Membuat Halaman Baru

Semua halaman harus menggunakan layout `app.blade.php`:

```blade
@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <!-- Your page content here -->
@endsection
```

### 2. Memanggil Komponen

#### Menggunakan @include (untuk components kecil)

```blade
@include('components.navbar')
@include('components.footer')
@include('components.customer.customer-card')
```

#### Menggunakan Laravel Components (modern way)

```blade
<x-navbar />
<x-footer />
<x-customer.customer-card :customer="$customer" />
```

### 3. Struktur Lengkap Component

Buat component di folder `resources/views/components/` dengan nama file `nama-component.blade.php`:

```blade
{{-- resources/views/components/button.blade.php --}}
<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-blue-600 text-white rounded']) }}>
    {{ $slot }}
</button>
```

Panggil dengan:

```blade
<x-button>Click Me</x-button>
```

### 4. Component dengan Props

```blade
{{-- resources/views/components/customer/card.blade.php --}}
@props(['customer', 'showDelete' => false])

<div class="p-4 bg-white rounded-lg shadow">
    <h3 class="text-lg font-bold">{{ $customer->name }}</h3>
    <p class="text-gray-600">{{ $customer->email }}</p>

    @if($showDelete)
        <button class="text-red-600 hover:text-red-800">Delete</button>
    @endif
</div>
```

Panggil dengan:

```blade
<x-customer.card :customer="$user" :show-delete="true" />
```

## 📝 Contoh Lengkap

### Halaman Customer

```blade
@extends('layouts.app')

@section('title', 'Customers - PSAJ Marketplace')

@section('content')
    <h1 class="text-3xl font-bold mb-6">List Customers</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($customers as $customer)
            <x-customer.card :customer="$customer" show-delete />
        @endforeach
    </div>
@endsection
```

### Component dengan Include

```blade
@extends('layouts.app')

@section('content')
    @include('components.header')

    <div class="content">
        <!-- Main content -->
    </div>

    @include('components.sidebar')
@endsection
```

## 🎯 Best Practices

1. **Gunakan Components untuk UI Reusable**
    - Buttons, Cards, Forms, Modals, dll

2. **Gunakan Layout untuk Page Structure**
    - Header, Footer, Sidebar, Navigation

3. **Gunakan Include untuk Sections Besar**
    - Hero sections, Feature blocks, dll

4. **Naming Convention**
    - Kebab-case untuk file: `my-component.blade.php`
    - Diakses sebagai: `<x-my-component />`
    - Subfolder: `<x-customer.my-component />`

5. **Props vs Slot**
    - Props: Untuk data yang bisa berubah
    - Slot: Untuk konten HTML yang kompleks

## 📚 Resources

- [Laravel Blade Documentation](https://laravel.com/docs/blade)
- [Laravel Components Documentation](https://laravel.com/docs/blade#components)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)

## 💡 Tips

- Selalu gunakan `@props` untuk mendefinisikan props yang diterima component
- Gunakan `{{ $attributes->merge(...) }}` untuk merge CSS classes
- Gunakan `@slot` untuk named slots pada component kompleks
- Leverage Tailwind's responsive classes: `md:`, `lg:`, `dark:`, dsb
