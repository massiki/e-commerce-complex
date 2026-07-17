# Progress Proyek E-Commerce Complex

**Terakhir diperbarui:** 15 Juli 2026

---

## Ringkasan Progress

| Komponen | Progress |
|----------|----------|
| Database Schema | ✅ ~90% |
| Models | ⬜ ~50% |
| Controllers | ⬜ ~15% |
| Views (Blade) | ⬜ ~50% |
| Routes | ⬜ ~15% |
| Tests | ⬜ ~10% |
| **Estimasi Keseluruhan** | **⬜ ~30%** |

---

## ✅ Sudah Selesai

### Authentication & Authorization
- Laravel Breeze (login, register, password reset, email verification)
- Role-based routing (`role:admin`, `role:customer`)
- `RoleMiddleware` — registered as `role` alias in `bootstrap/app.php`
- Login redirect by role (`AuthenticatedSessionController`)

### Database Schema (23 Migration Files)
| # | File | Table |
|---|------|-------|
| 1 | `0001_01_01_000000_create_users_table.php` | `users`, `password_reset_tokens`, `sessions` |
| 2 | `0001_01_01_000001_create_cache_table.php` | `cache`, `cache_locks` |
| 3 | `0001_01_01_000002_create_jobs_table.php` | `jobs`, `job_batches`, `failed_jobs` |
| 4 | `0001_01_01_000003_create_roles_table.php` | `roles` |
| 5 | `0001_01_01_000004_add_role_id_and_phone_to_users_table.php` | **Alter** `users` (+ `role_id`, `phone`) |
| 6 | `0001_01_01_000005_create_categories_table.php` | `categories` |
| 7 | `0001_01_01_000006_create_brands_table.php` | `brands` |
| 8 | `0001_01_01_000007_create_sliders_table.php` | `sliders` |
| 9 | `0001_01_01_000008_create_coupons_table.php` | `coupons` |
| 10 | `0001_01_01_000009_create_products_table.php` | `products` |
| 11 | `0001_01_01_000010_create_product_images_table.php` | `product_images` |
| 12 | `0001_01_01_000011_create_discounts_table.php` | `discounts` |
| 13 | `0001_01_01_000012_create_addresses_table.php` | `addresses` |
| 14 | `0001_01_01_000013_create_carts_table.php` | `carts` |
| 15 | `0001_01_01_000014_create_wishlists_table.php` | `wishlists` |
| 16 | `0001_01_01_000015_create_cart_items_table.php` | `cart_items` |
| 17 | `0001_01_01_000016_create_wishlist_items_table.php` | `wishlist_items` |
| 18 | `0001_01_01_000017_create_coupon_usages_table.php` | `coupon_usages` |
| 19 | `0001_01_01_000018_create_notifications_table.php` | `notifications` |
| 20 | `0001_01_01_000019_create_activity_logs_table.php` | `activity_logs` |
| 21 | `0001_01_01_000020_create_orders_table.php` | `orders` |
| 22 | `0001_01_01_000021_create_order_items_table.php` | `order_items` |
| 23 | `0001_01_01_000022_create_reviews_table.php` | `reviews` |

### Seeders
- `DatabaseSeeder` — seeds: 2 roles (admin, customer), 2 users (admin@gmail.com, customer@gmail.com), 5 brands, 5 categories, 50 products
- Factories: `UserFactory`, `CategoryFactory`, `BrandFactory`, `ProductFactory`

### Admin CRUD
- **Brand CRUD** — Controller (`index`, `create`, `store`, `edit`, `update`, `destroy`) + Views (`index`, `create`, `edit`) + Routes ✅
- **Category CRUD** — Controller (`index`, `create`, `store`, `edit`, `update`, `destroy`) + Views (`index`, `create`, `edit`) + Routes ✅

---

## ⬜ Sebagian (Views Ada, Controller/Routes Belum)

### Admin Area
| Fitur | View Files | Controller | Routes |
|-------|-----------|------------|--------|
| Products | `index`, `create`, `edit` | ❌ | ❌ |
| Coupons | `index`, `create`, `edit` | ❌ | ❌ |
| Orders | `index`, `show` | ❌ | ❌ |
| Customers | `index` | ❌ | ❌ |
| Reviews | `index` | ❌ | ❌ |
| Activities | `index` | ❌ | ❌ |
| Settings | `index` | ❌ | ❌ |

### Customer Area
| Fitur | View Files | Controller | Routes |
|-------|-----------|------------|--------|
| Home | `customer/home.blade.php` | ❌ | ❌ |
| Product Listing | `customer/product.blade.php` | ❌ | Route points to static view |
| Product Detail | `customer/product-detail.blade.php` | ❌ | ❌ |
| Carts | `customer/carts.blade.php` | ❌ | ❌ |
| Wishlists | `customer/wishlists.blade.php` | ❌ | ❌ |
| Dashboard | `customer/dashboard/index.blade.php` | ❌ | Route points to static view |
| Account | `customer/dashboard/account.blade.php` | ❌ | ❌ |
| History | `customer/dashboard/history.blade.php` | ❌ | ❌ |
| Orders | `customer/dashboard/orders/index, show` | ❌ | ❌ |
| Addresses | `customer/dashboard/addresses/index, create, edit` | ❌ | ❌ |

---

## ❌ Belum Tersentuh Sama Sekali

| Fitur | Prioritas | Keterangan |
|-------|-----------|------------|
| Checkout (Midtrans) | 🔴 Tinggi | Belum ada package `midtrans/midtrans-php`, belum ada logika payment |
| Checkout (COD) | 🔴 Tinggi | - |
| Discount Scheduler | 🟡 Sedang | Butuh Laravel Task Scheduler + console command |
| Dashboard Analytics | 🟡 Sedang | View statis, belum connect ke database |
| PDF Invoice | 🟡 Sedang | Butuh `barryvdh/laravel-dompdf` |
| Notification System | 🟡 Sedang | Belum ada `app/Notifications/` |
| Auto Rating Calculation | 🟢 Ringan | - |
| Low Stock Warning | 🟢 Ringan | - |
| Soft Delete Product | 🟢 Ringan | - |
| Activity Log Automation | 🟢 Ringan | Masih manual di controller |
| Slider Management | 🟢 Ringan | Model & migration ada, sisanya belum |

---

## 🔧 Issues / Technical Debt

| Issue | Detail | Severity |
|-------|--------|----------|
| Register tidak assign role | User baru daftar dapat `role_id = null` | Tinggi |
| Banyak model tanpa `$fillable` | Product, Coupon, Slider, dll — mass assignment error | Tinggi |
| Route profile di-comment | `routes/web.php` line 36-40 | Sedang |
| Dashboard masih statis | Belum ada query real dari database | Sedang |
| Activity log manual | Belum pakai event/listener atau observer | Rendah |

---

## Rekomendasi Prioritas Pengembangan

| Urutan | Fitur | Alasan |
|--------|-------|--------|
| 1 | **Product CRUD** | Core bisnis, views sudah siap, tinggal controller + routes |
| 2 | **Checkout (COD → Midtrans)** | Alur transaksi utama, prioritas tinggi |
| 3 | **Order Management** | Admin harus bisa memproses pesanan |
| 4 | **Coupon System** | Views sudah ada, integrasi dengan checkout |
| 5 | **Dashboard Analytics** | Query real dari database |
| 6 | **Discount Scheduler** | Otomatisasi diskon |
| 7 | **Customer Addresses** | Syarat checkout |
| 8 | **Reviews & Rating** | Setelah order selesai |
| 9 | **Notification System** | Notifikasi transaksi |
| 10 | **PDF Invoice** | Setelah payment |
| 11 | **Activity Log Automation** | Event/listener |
| 12 | **Low Stock Warning** | Monitoring stok |
| 13 | **Slider Management** | Frontend hero section |
| 14 | **Soft Delete Product** | Data safety |

---

## Detail Fitur per Modul (dari BRIEF.md)

### Admin
- [x] Login
- [x] CRUD Category
- [x] CRUD Brand
- [ ] Dashboard (Revenue, Orders, Customers, Products, Monthly Sales, Best Selling, Low Stock)
- [ ] CRUD Product (+ Multiple Images, Stock Management, Soft Delete & Restore)
- [ ] CRUD Coupon (Minimum Purchase, Expiration Date)
- [ ] Discount Scheduler (Start/End, Auto Return Normal Price)
- [ ] Order Management (Pending → Paid → Processing → Shipped → Completed/Cancelled)
- [ ] Customer Management (List, Detail, Purchase History)
- [ ] Review Management (View Reviews & Ratings)
- [ ] Activity Log (Login, Product, Order, Coupon)

### Customer
- [x] Register
- [x] Login
- [ ] Dashboard (Total Orders, Spending, Wishlist, Notifications, Payment History)
- [ ] Browse Products (Search, Filter, Detail)
- [ ] Wishlist (Add, Remove)
- [ ] Shopping Cart (Add, Update Qty, Remove)
- [ ] Address Management (Rumah/Kantor/Kos — Recipient, Phone, Province, City, District, Postal Code, Full Address)
- [ ] Checkout (Midtrans & COD)
- [ ] Order Detail (Invoice, Status, Items, Shipping Cost, Total)
- [ ] Payment History
- [ ] Product Review (Rating 1-5, Review setelah Completed)
- [ ] Notification (Order Created, Payment Success, Processed, Shipped, Completed, Coupon Applied)
- [ ] Invoice (Download PDF)

---

## Stack & Dependencies

### Terpasang
| Package | Version |
|---------|---------|
| `laravel/framework` | ^13.8 |
| `laravel/breeze` | ^2.4 |
| `pestphp/pest` | ^4.7 |
| `laravel/pint` | ^1.27 |
| `laravel/debugbar` | ^4.4 |

### Perlu Ditambahkan
| Package | Untuk |
|---------|-------|
| `midtrans/midtrans-php` | Payment gateway |
| `barryvdh/laravel-dompdf` | PDF invoice |
| `spatie/laravel-activitylog` (opsional) | Activity log otomatis |

---

## Total File Summary

```
app/Models/              → 20 models (banyak minimal tanpa $fillable)
app/Http/Controllers/    → 13 controllers (hanya 2 admin: Brand, Category)
resources/views/         → 62 Blade files
database/migrations/     → 23 migrations
database/seeders/        → 1 seeder
database/factories/      → 4 factories
routes/                  → web.php, auth.php, console.php
tests/                   → 9 test files (semua Breeze default)
planning/                → 6 dokumen (BRIEF, ERD, USE_CASE, SEQUENCE, ACTIVITY, progres)
```
