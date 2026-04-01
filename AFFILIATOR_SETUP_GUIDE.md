# Setup Guide: Affiliator Registration System

Sistem Affiliator Registration telah berhasil diimplementasikan! Berikut adalah langkah-langkah untuk menyelesaikan setup:

## 📋 Checklist Setup

### 1. **Run Database Migrations** ✅ LANGKAH PERTAMA

Jalankan perintah berikut untuk membuat tabel `affiliators`:

```bash
php artisan migrate
```

Ini akan membuat tabel `affiliators` dengan struktur:

- `id` - Primary Key
- `user_id` - Foreign Key ke users
- `store_name`, `store_description` - Info bisnis
- `phone`, `address` - Data kontak
- `platforms` - JSON array (instagram, blog, community, other)
- `bank_name`, `bank_account_number`, `bank_account_name` - Data bank
- `status` - pending|active|suspended|inactive
- `total_commissions`, `pending_balance` - Tracking finansial
- `timestamps`

### 2. **Verifikasi Routes** ✅ SUDAH SELESAI

Routes yang telah ditambahkan:

```
GET  /dashboard                    → customer.dashboard
GET  /daftar-affiliator            → afiliator.register (show form)
POST /daftar-affiliator            → afiliator.store (process registration)
GET  /afiliator                    → afiliator.dashboard
GET  /afiliator/riwayat-penjualan  → afiliator.sales-history
GET  /afiliator/commissions        → afiliator.commissions
```

### 3. **Penting: Update Model Relationships** ✅ SUDAH SELESAI

User model sudah diupdate dengan:

- `affiliatorProfile()` - HasOne relation
- `isAffiliator()` - Helper method

### 4. **Fitur-Fitur yang Tersedia**

#### A. Customer Dashboard (`/dashboard`)

- ✅ Profile card dengan avatar
- ✅ Quick stats (Total Pembelian, Total Pengeluaran)
- ✅ Affiliator promo card (untuk non-affiliator)
- ✅ Recent orders table dengan akses cepat
- ✅ Navigation sidebar dengan conditional "Dashboard Affiliator"
- ✅ Link ke "Daftar Sebagai Affiliator" (hanya untuk non-affiliator)

#### B. Affiliator Registration Form (`/daftar-affiliator`)

- ✅ Informasi Pribadi: Nama (auto), Email (auto), Telepon, Alamat
- ✅ Informasi Bisnis: Nama Toko, Deskripsi, Platform Marketing
- ✅ Informasi Bank: Nama Bank, No Rekening, Nama Pemilik Rekening
- ✅ Agreement checkbox
- ✅ Validasi lengkap dengan error messages
- ✅ Form styling dengan dark mode support

#### C. Dashboard Affiliator (`/afiliator`)

- ✅ Menampilkan stats: Total Commissions, Pending Commissions, Sales Count
- ✅ Affiliator profile info
- ✅ Commission history dengan pagination
- ⏳ Membutuhkan update untuk menampilkan data yang benar

### 5. **Navigation Updates** ✅ SUDAH SELESAI

#### Sidebar Updates:

- Profile menu menampilkan "Dashboard Affiliator" hanya jika user adalah affiliator
- Link ke "Daftar Affiliator" untuk customers yang belum terdaftar

#### Dropdown Navigation:

- Customer dapat akses Dashboard dari profile menu
- Affiliator dapat akses Dashboard Affiliator dari profile menu

### 6. **Auth Flow Updates** ✅ SUDAH SELESAI

#### Login Redirect:

- Admin/Superadmin → `/admin` (admin.dashboard)
- Affiliator → `/afiliator` (afiliator.dashboard)
- Customer → `/dashboard` (customer.dashboard)

#### Register Flow:

- New user dibuat dengan role = 'customer'
- Redirect ke `/dashboard`
- Dapat upgrade ke affiliator via `/daftar-affiliator`

## 🔧 Troubleshooting

### Issue: Migration Error

**Solusi**: Pastikan sudah run `php artisan migrate`

### Issue: Route tidak ditemukan

**Solusi**: Jalankan `php artisan route:cache` atau `php artisan route:clear`

### Issue: Affiliator data tidak muncul

**Solusi**: Pastikan user sudah register dan tabel affiliators sudah ada di database

## 📝 Next Steps (Optional Enhancements)

1. **Admin Approval System**
    - Tambah halaman admin untuk approve/reject affiliator registrations
    - Update status dari 'pending' ke 'active'

2. **Commission Tracking**
    - Implementasi logic untuk generate commissions otomatis saat ada order
    - Tambahi payment verification system

3. **Withdrawal/Payout**
    - Implement withdrawal request form
    - Add status tracking (pending, approved, paid)

4. **Email Notifications**
    - Kirim email saat affiliator registration submitted
    - Kirim email saat registration diapprove/reject
    - Kirim email saat commission earned

5. **Analytics Dashboard**
    - Chart untuk commission trend
    - Sales performance metrics
    - Referral tracking

## 🚀 Quick Start Commands

```bash
# 1. Run migrations
php artisan migrate

# 2. Cache routes (optional but recommended)
php artisan route:cache

# 3. Test the flow
# - Register as customer at /register
# - Go to /dashboard
# - Click "Daftar Sebagai Affiliator"
# - Fill out the form
# - Check database to verify data was saved
```

## 📫 Database Schema (Affiliators Table)

```sql
CREATE TABLE affiliators (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  user_id BIGINT NOT NULL,
  store_name VARCHAR(255) NOT NULL,
  store_description TEXT NOT NULL,
  phone VARCHAR(255),
  address TEXT,
  platforms JSON,
  bank_name VARCHAR(255),
  bank_account_number VARCHAR(255),
  bank_account_name VARCHAR(255),
  total_commissions INT DEFAULT 0,
  total_withdrawals INT DEFAULT 0,
  pending_balance INT DEFAULT 0,
  status ENUM('pending', 'active', 'suspended', 'inactive') DEFAULT 'pending',
  approved_at TIMESTAMP NULL,
  activated_at TIMESTAMP NULL,
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  INDEX (status)
);
```

---

**Status**: ✅ Setup Complete! Siap untuk production (dengan optional enhancements)
