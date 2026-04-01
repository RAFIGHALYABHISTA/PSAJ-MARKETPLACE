# 🚀 QUICK START GUIDE - Affiliator System

## ⚡ 5-Minute Setup

### Step 1: Run Migration (1 minute)

```bash
php artisan migrate
```

✅ Creates `affiliators` table with all necessary fields

### Step 2: Test the Flow (4 minutes)

#### Register New Customer

- Go to `http://yoursite.local/register`
- Fill form: Nama, Email, Password (twice)
- Click "Daftar"
- You're now logged in as **Customer** ✅

#### Visit Customer Dashboard

- You should be automatically redirected to `/dashboard`
- See profile card, quick stats, order history
- Notice promo card: "Jadilah Affiliator Sariayu 🌟" ✅

#### Register as Affiliator

- Click "Mulai Sekarang" OR click profile dropdown → "Daftar Sekarang"
- Go to `/daftar-affiliator`
- Fill form:
    - **Personal Info**: Phone, Address
    - **Business Info**: Store Name, Description, Platform (select at least 1)
    - **Bank Info**: Bank Name, Account Number, Account Holder Name
    - Check "Agree with Terms"
- Click "✓ Daftar Sekarang"
- You're now **Affiliator** user ✅

#### View Affiliator Dashboard

- Should redirect to `/afiliator`
- See commission stats, sales history
- Can view riwayat-penjualan and commissions pages ✅

### Step 3: Test Login Flow

- Logout
- Login as your affiliator account
- Notice you're redirected to `/afiliator` instead of `/dashboard` ✅

---

## 📂 Complete File Structure

```
PSAJ-MARKETPLACE/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AfiliatorController.php          [NEW]
│   │       ├── AuthController.php               [UPDATED]
│   ├── Models/
│   │   ├── Affiliator.php                       [NEW]
│   │   └── User.php                             [UPDATED]
├── database/
│   └── migrations/
│       └── 2026_02_26_025000_create_affiliators_table.php  [NEW]
├── resources/
│   └── views/
│       ├── customer/
│       │   ├── dashboard.blade.php              [NEW]
│       │   ├── orders.blade.php                 [NEW]
│       │   ├── profile.blade.php                [NEW]
│       ├── afiliator/
│       │   ├── register.blade.php               [NEW]
│       │   ├── sales-history.blade.php          [EXISTS]
│       │   ├── commissions.blade.php            [EXISTS]
│       │   └── dashboard.blade.php              [EXISTS]
│       └── layouts/
│           └── customer.blade.php               [UPDATED/NEW]
├── routes/
│   └── web.php                                  [UPDATED]
├── AFFILIATOR_SETUP_GUIDE.md                   [NEW]
└── AFFILIATOR_IMPLEMENTATION_SUMMARY.md        [NEW]
```

---

## 🔗 URL Reference

### Customer Routes

| Method | URL                  | Route Name           | Description                        |
| ------ | -------------------- | -------------------- | ---------------------------------- |
| GET    | `/`                  | `home`               | Home page or redirect to dashboard |
| GET    | `/dashboard`         | `customer.dashboard` | Customer dashboard                 |
| GET    | `/profile`           | `customer.profile`   | Customer profile                   |
| GET    | `/orders`            | `customer.orders`    | Customer order history             |
| GET    | `/daftar-affiliator` | `afiliator.register` | Affiliator registration form       |
| POST   | `/daftar-affiliator` | `afiliator.store`    | Process registration               |

### Affiliator Routes

| Method | URL                               | Route Name                       | Description          |
| ------ | --------------------------------- | -------------------------------- | -------------------- |
| GET    | `/afiliator`                      | `afiliator.dashboard`            | Affiliator dashboard |
| GET    | `/afiliator/riwayat-penjualan`    | `afiliator.sales-history`        | Sales history        |
| GET    | `/afiliator/commissions`          | `afiliator.commissions`          | Commission history   |
| POST   | `/afiliator/commissions/withdraw` | `afiliator.commissions.withdraw` | Request withdrawal   |

### Auth Routes

| Method | URL         | Route Name            | Description          |
| ------ | ----------- | --------------------- | -------------------- |
| GET    | `/login`    | `auth.login`          | Login form           |
| POST   | `/login`    | `auth.authenticate`   | Process login        |
| GET    | `/register` | `auth.register`       | Register form        |
| POST   | `/register` | `auth.register.store` | Process registration |
| POST   | `/logout`   | `auth.logout`         | Logout               |

---

## 🎯 Key Features

### ✅ Customer Dashboard Features

- [x] User profile card dengan avatar
- [x] Quick stats: Total Purchases & Total Spending
- [x] Affiliator promotion card
- [x] Recent orders table
- [x] Link to update profile
- [x] Link to order history
- [x] Dark mode support

### ✅ Affiliator Registration Features

- [x] 3 form sections (Personal, Business, Bank)
- [x] 15 form fields dengan validation
- [x] Platform selection (Instagram, Blog, Community, Other)
- [x] Auto-filled fields (Name, Email)
- [x] Comprehensive error messages
- [x] Terms acceptance
- [x] Benefits showcase section
- [x] Dark mode support

### ✅ Database Features

- [x] Affiliators table dengan complete schema
- [x] Foreign key to users (on delete cascade)
- [x] Commission tracking fields
- [x] Status enum (pending, active, suspended, inactive)
- [x] Bank information storage
- [x] Platform preferences as JSON

### ✅ Auth Features

- [x] Role-based redirects after login
    - Admin/Superadmin → Admin dashboard
    - Affiliator → Affiliator dashboard
    - Customer → Customer dashboard
- [x] Auto-login after registration
- [x] New users default to customer role
- [x] Role update when registering as affiliator

---

## 💾 Database Schema

### Affiliators Table

```sql
CREATE TABLE affiliators (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  user_id BIGINT NOT NULL UNIQUE,
  store_name VARCHAR(255) NOT NULL,
  store_description TEXT NOT NULL,
  phone VARCHAR(255),
  address TEXT,
  platforms JSON,                           -- ["instagram", "blog"]
  bank_name VARCHAR(255),
  bank_account_number VARCHAR(255),
  bank_account_name VARCHAR(255),
  total_commissions INT DEFAULT 0,
  total_withdrawals INT DEFAULT 0,
  pending_balance INT DEFAULT 0,
  status ENUM('pending','active','suspended','inactive') DEFAULT 'pending',
  approved_at TIMESTAMP NULL,
  activated_at TIMESTAMP NULL,
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  INDEX status_idx (status)
);
```

---

## 🔍 Debugging Tips

### Issue: Routes not found

```bash
php artisan route:cache
# or
php artisan route:clear
```

### Issue: View not found

Make sure layout file exists:

- `resources/views/layouts/customer.blade.php` ✅

### Issue: Model relation errors

Check User model has:

```php
public function affiliatorProfile(): HasOne {
    return $this->hasOne(Affiliator::class);
}
```

### Issue: Migration failed

Ensure `user_id` references correct table and column:

```php
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
```

---

## 📊 Database Verification

After migration, verify data:

```php
// Check if table exists
\DB::table('affiliators')->count() // Should return 0 initially

// After registration, check affiliator record
$affiliator = \App\Models\Affiliator::first();
$affiliator->store_name;           // "My Store"
$affiliator->user->name;           // User name
$affiliator->status;               // "pending"
$affiliator->platforms;            // ["instagram", "blog"]
```

---

## 🎓 Learning Path

1. **Understand the flow** → Read `AFFILIATOR_IMPLEMENTATION_SUMMARY.md`
2. **Setup the system** → Run migrations
3. **Test registration** → Follow "5-Minute Setup" steps
4. **Review code** → Check controllers and models
5. **Implement enhancements** → See "Next Steps" in summary

---

## 🚦 Status

| Component   | Status   | Notes                                               |
| ----------- | -------- | --------------------------------------------------- |
| Models      | ✅ Ready | Affiliator model created, User updated              |
| Migrations  | ✅ Ready | Need to run `migrate`                               |
| Controllers | ✅ Ready | AfiliatorController created, AuthController updated |
| Views       | ✅ Ready | Dashboard, Register form, placeholders ready        |
| Routes      | ✅ Ready | All routes configured                               |
| Auth Flow   | ✅ Ready | Role-based redirects implemented                    |
| Validation  | ✅ Ready | Form validation with error messages                 |
| UI/UX       | ✅ Ready | Dark mode, responsive design                        |

---

## ✨ You're All Set!

```bash
# Run migration
php artisan migrate

# Clear cache (if needed)
php artisan route:clear
php artisan view:clear

# Test in browser
# http://yoursite.local/register
```

🎉 System is ready to use!
