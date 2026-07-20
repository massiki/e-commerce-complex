# Progress Proyek E-Commerce Complex

**Terakhir diperbarui:** 19 Juli 2026

---

## Ringkasan Progress

| Komponen | Progress |
|----------|----------|
| Database Schema | ✅ ~100% (23 migrations) |
| Models | ✅ ~100% (20 models, 50% pakai fillable/guarded) |
| Controllers | ⬜ ~60% (10 admin: 5 complete, 5 partial; 1 customer) |
| Views (Blade) | ⬜ ~65% (71 file: 22 admin + 13 customer + 19 components + 5 layouts + 6 auth + 6 other) |
| Routes | ⬜ ~65% (11 admin groups, 1 customer route + 1 closure) |
| Tests | ⬜ ~10% (11 files, semua Breeze default) |
| **Estimasi Keseluruhan** | **⬜ ~43%** |

---

## ✅ Sudah Selesai

### Authentication & Authorization
- Laravel Breeze (login, register, password reset, email verification)
- Role-based routing (`role:admin`, `role:customer`)
- `RoleMiddleware` — registered as `role` alias in `bootstrap/app.php`
- Login redirect by role (`AuthenticatedSessionController`)
- 2 roles seeded: admin & customer
- 2 users seeded: admin@gmail.com & customer@gmail.com

### Database Schema (23 Migration Files)
| # | File | Table |
|---|------|-------|
| 1 | `create_users_table` | `users`, `password_reset_tokens`, `sessions` |
| 2 | `create_cache_table` | `cache`, `cache_locks` |
| 3 | `create_jobs_table` | `jobs`, `job_batches`, `failed_jobs` |
| 4 | `create_roles_table` | `roles` |
| 5 | `add_role_id_and_phone_to_users_table` | **Alter** `users` (+ `role_id`, `phone`) |
| 6 | `create_categories_table` | `categories` |
| 7 | `create_brands_table` | `brands` |
| 8 | `create_sliders_table` | `sliders` |
| 9 | `create_coupons_table` | `coupons` |
| 10 | `create_products_table` | `products` |
| 11 | `create_product_images_table` | `product_images` |
| 12 | `create_discounts_table` | `discounts` |
| 13 | `create_addresses_table` | `addresses` |
| 14 | `create_carts_table` | `carts` |
| 15 | `create_wishlists_table` | `wishlists` |
| 16 | `create_cart_items_table` | `cart_items` |
| 17 | `create_wishlist_items_table` | `wishlist_items` |
| 18 | `create_coupon_usages_table` | `coupon_usages` |
| 19 | `create_notifications_table` | `notifications` |
| 20 | `create_activity_logs_table` | `activity_logs` |
| 21 | `create_orders_table` | `orders` |
| 22 | `create_order_items_table` | `order_items` |
| 23 | `create_reviews_table` | `reviews` |

### Seeders
- `DatabaseSeeder` — seeds: 2 roles, 2 users, 5 brands, 5 categories, 50 products
- Factories: `UserFactory`, `CategoryFactory`, `BrandFactory`, `ProductFactory`, `DiscountFactory`

### Models (20 total)
| Status | Models |
|--------|--------|
| ✅ Dengan `$fillable` / `$guarded` | User (`#[Fillable]`), Brand, Category, Coupon, Slider, Product (`#[Guarded([])]`), ProductImage (`#[Guarded([])]`), Discount (`#[Guarded([])]`), Review (`#[Guarded([])]`), ActivityLog |
| ⬜ Tanpa `$fillable` / `$guarded` (rentan mass assignment) | Cart, CartItem, Order, OrderItem, CouponUsage, Wishlist, WishlistItem, Address, Notification, Role |

### Admin CRUD — Complete (Controller + Views + Routes + ActivityLog)
| Fitur | Controller | Index | Create | Edit | Store | Update | Destroy | ActivityLog |
|-------|-----------|-------|--------|------|-------|--------|---------|-------------|
| **Brand** | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ store/update/destroy |
| **Category** | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ store/update/destroy |
| **Coupon** | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ store/update/destroy |
| **Product** | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ store/update/destroy |
| **Slider** | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ store/update/destroy |

### Routes (web.php)
- 7 resource routes di admin: brands, categories, products, coupons, sliders (semua `except(['show'])`), orders (FULL resource)
- 3 GET-only routes: customers, reviews, activities
- 1 index+update route: settings
- 1 customer dashboard route: dashboard
- 1 home route: `/` → `HomeController::index`
- 1 guest route: products (static view)

---

## ⬜ Sebagian (Controller Parsial, View Terbatas)

### Admin — Controller hanya index saja (atau parsial)
| Fitur | Controller | View | Route | ActivityLog |
|-------|-----------|------|-------|-------------|
| Customers | `index()` saja | `index.blade.php` | GET only | ❌ |
| Reviews | `index()` saja | `index.blade.php` | GET only | ❌ |
| Activities | `index()` saja | `index.blade.php` | GET only | ❌ (read-only) |
| Settings | `index()` + `update()` | `index.blade.php` | GET + POST | ❌ |
| **Orders** | **`index()` saja** | **`index.blade.php`, `show.blade.php`** | **Full resource** (hanya index terisi) | ❌ |

### Customer Area — Sebagian sudah ada controller
| Fitur | View Files | Controller | Routes |
|-------|-----------|------------|--------|
| **Home** | **`customer/home.blade.php`** | **✅ `HomeController::index()`** | **✅ `Route::get('/', ...)`** |
| Product Listing | `customer/product.blade.php` | ❌ | Closure static view |
| Product Detail | `customer/product-detail.blade.php` | ❌ | ❌ |
| Carts | `customer/carts.blade.php` | ❌ | ❌ |
| Wishlists | `customer/wishlists.blade.php` | ❌ | ❌ |
| Dashboard | `customer/dashboard/index.blade.php` | ❌ | Closure static view |
| Account | `customer/dashboard/account.blade.php` | ❌ | ❌ |
| History | `customer/dashboard/history.blade.php` | ❌ | ❌ |
| Orders (customer) | `dashboard/orders/index.blade.php`, `show.blade.php` | ❌ | ❌ |
| Addresses | `dashboard/addresses/index.blade.php`, `create.blade.php`, `edit.blade.php` | ❌ | ❌ |

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
| Customer Controllers (8 fitur) | 🟡 Sedang | Baru HomeController, 8 fitur lainnya masih view statis |
| Order `show/edit/update/destroy` | 🟡 Sedang | Controller cuma punya `index()` |
| Auto Rating Calculation | 🟢 Ringan | - |
| Low Stock Warning | 🟢 Ringan | - |
| Soft Delete Product | 🟢 Ringan | - |
| Activity Log Automation | 🟢 Ringan | Masih manual di controller |

---

## 🔧 Issues / Technical Debt

| Issue | Detail | Severity |
|-------|--------|----------|
| Register tidak assign role | User baru daftar dapat `role_id = null` | 🔴 Tinggi |
| 10 model tanpa `$fillable`/`$guarded` | Cart, CartItem, Order, OrderItem, CouponUsage, Wishlist, WishlistItem, Address, Notification, Role — rawan mass assignment | 🔴 Tinggi |
| Route profile di-comment | `routes/web.php` line 64-68 | 🟡 Sedang |
| Dashboard masih statis | Belum ada query real dari database | 🟡 Sedang |
| Activity log manual | Belum pakai event/listener atau observer | 🟡 Sedang |
| **OrderController hanya index()** | Full resource route, tapi show/create/store/edit/update/destroy belum diimplementasi | 🟡 Sedang |
| **Customer controller minim** | Hanya `HomeController::index()` yang aktif, 8 fitur lainnya masih closure/view statis | 🔴 Tinggi |
| Inconsistency `Auth::user()->id` vs `Auth::id()` | Brand/Category/Slider pakai `Auth::user()->id`, Coupon/Product pakai `Auth::id()` | 🟢 Ringan |

---

## Rekomendasi Prioritas Pengembangan

| Urutan | Fitur | Alasan |
|--------|-------|--------|
| 1 | **Order Management (Admin)** | Controller baru index(), perlu show + update status order + routes |
| 2 | **Checkout (COD → Midtrans)** | Alur transaksi utama |
| 3 | **Customer Controllers** | Landing page, product listing, cart, wishlist, dll |
| 4 | **Dashboard Analytics** | Query real dari database untuk admin & customer |
| 5 | **Discount Scheduler** | Otomatisasi diskon |
| 6 | **Reviews & Rating** | Setelah order selesai |
| 7 | **Notification System** | Notifikasi transaksi |
| 8 | **PDF Invoice** | Setelah payment |
| 9 | **Activity Log Automation** | Event/listener |
| 10 | **Low Stock Warning** | Monitoring stok |
| 11 | **Soft Delete Product** | Data safety |

---

## Detail Fitur per Modul (dari BRIEF.md)

### Admin
- [x] Login
- [x] CRUD Category
- [x] CRUD Brand
- [x] CRUD Coupon
- [x] CRUD Product (+ Multiple Images, Stock Management)
- [x] CRUD Slider
- [ ] Dashboard (Revenue, Orders, Customers, Products, Monthly Sales, Best Selling, Low Stock)
- [ ] Discount Scheduler (Start/End, Auto Return Normal Price)
- [ ] Order Management (Pending → Paid → Processing → Shipped → Completed/Cancelled)
- [ ] Customer Management (List, Detail, Purchase History)
- [ ] Review Management (View Reviews & Ratings)
- [ ] Activity Log (Login, Product, Order, Coupon)

### Customer
- [x] Register
- [x] Login
- [x] Home Page (Hero Slider, Categories, Hot Deals, Featured Products)
- [/] Dashboard (Total Orders, Spending, Wishlist, Notifications, Payment History) — view statis
- [/] Browse Products (Search, Filter, Detail) — view statis
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
app/Models/              → 20 models (10 tanpa $fillable/guarded)
app/Http/Controllers/    → 22 controllers (10 admin: 5 complete CRUD, 5 partial; 1 customer; 8 auth; 1 profile; 1 base; 1 home)
resources/views/         → 71 Blade files (22 admin + 13 customer + 19 components + 5 layouts + 6 auth + 6 other)
database/migrations/     → 23 migrations
database/seeders/        → 1 seeder (DatabaseSeeder)
database/factories/      → 5 factories (+ DiscountFactory)
routes/                  → web.php, auth.php, console.php
tests/                   → 11 test files (semua Breeze default)
planning/                → 6 dokumen (BRIEF, ERD, USE_CASE, SEQUENCE, ACTIVITY, progres)
```
