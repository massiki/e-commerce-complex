# Project Brief

## E-Commerce Platform

### Project Overview

Sistem E-Commerce merupakan aplikasi berbasis web yang dirancang untuk
memfasilitasi proses jual beli produk secara online. Sistem ini
menyediakan dua jenis pengguna, yaitu **Admin** dan **Customer**, dengan
hak akses dan fitur yang berbeda.

Admin bertugas mengelola seluruh operasional toko, mulai dari
pengelolaan produk, kategori, merek, diskon, kupon, hingga pemrosesan
pesanan pelanggan. Selain itu, admin dapat memantau performa toko
melalui dashboard analytics, melihat laporan penjualan, mengelola stok
produk, serta memonitor aktivitas pengguna.

Customer dapat melakukan registrasi, mencari produk, menyimpan produk ke
wishlist, menambahkan produk ke keranjang, melakukan checkout
menggunakan Midtrans maupun Cash On Delivery (COD), memberikan ulasan
produk setelah pembelian, serta mengelola alamat pengiriman dan riwayat
transaksi.

Sistem juga dilengkapi dengan berbagai fitur otomatis seperti
perhitungan rating produk, penjadwalan diskon menggunakan countdown
timer, notifikasi transaksi, serta pembuatan invoice dalam format PDF.

------------------------------------------------------------------------

# Project Goals

-   Membangun platform e-commerce modern berbasis web.
-   Mempermudah proses transaksi jual beli secara online.
-   Mengintegrasikan sistem pembayaran Midtrans.
-   Mengelola stok dan diskon produk secara otomatis.
-   Menyediakan dashboard analitik bagi admin.
-   Memberikan pengalaman belanja yang nyaman bagi pelanggan.

------------------------------------------------------------------------

# User Roles

## Admin

### Authentication

-   Login

### Dashboard

-   Total Revenue
-   Total Orders
-   Total Customers
-   Total Products
-   Monthly Sales
-   Best Selling Products
-   Low Stock Warning

### Product Management

-   CRUD Product
-   Multiple Product Images
-   Product Stock Management
-   Automatic Product Rating
-   Soft Delete & Restore Product

### Category Management

-   CRUD Category

### Brand Management

-   CRUD Brand

### Coupon Management

-   Create, Update, Delete Coupon
-   Minimum Purchase Validation
-   Expiration Date

### Discount Scheduler

-   Schedule Discount Start
-   Schedule Discount End
-   Automatic Return to Normal Price

### Order Management

Status: - Pending - Paid - Processing - Shipped - Completed - Cancelled

### Customer Management

-   View Customer List
-   Customer Detail
-   Purchase History

### Review Management

-   View Product Reviews
-   View Product Ratings

### Activity Log

-   Login Activity
-   Product Activity
-   Order Activity
-   Coupon Activity

------------------------------------------------------------------------

## Customer

### Authentication

-   Register
-   Login

### Dashboard

-   Total Orders
-   Total Spending
-   Wishlist Summary
-   Notifications
-   Payment History

### Product

-   Browse Products
-   Search Product
-   Filter Product
-   View Product Detail

### Wishlist

-   Add to Wishlist
-   Remove Wishlist

### Shopping Cart

-   Add Product
-   Update Quantity
-   Remove Product

### Address Management

Customer dapat memiliki lebih dari satu alamat: - Rumah - Kantor - Kos

Data alamat: - Recipient Name - Phone Number - Province - City -
District - Postal Code - Full Address - Note (optional)

### Checkout

-   Midtrans Payment Gateway
-   Cash On Delivery (COD)

### Order Detail

-   Invoice Number
-   Order Status
-   Purchased Items
-   Quantity
-   Shipping Cost
-   Total Payment

### Payment History

-   View Payment History

### Product Review

-   Rating (1--5)
-   Review setelah pesanan selesai (Completed)

### Notification

-   Order Created
-   Payment Success
-   Order Processed
-   Order Shipped
-   Order Completed
-   Coupon Applied

### Invoice

-   Download PDF Invoice

------------------------------------------------------------------------

# Main Features

-   Authentication & Authorization
-   Product Management
-   Category Management
-   Brand Management
-   Shopping Cart
-   Wishlist
-   Checkout (Midtrans & COD)
-   Coupon System
-   Discount Scheduler
-   Order Management
-   Dashboard Analytics
-   Product Review & Rating
-   Notification System
-   PDF Invoice
-   Activity Log
-   Low Stock Warning

------------------------------------------------------------------------

# Suggested Database Tables

  Module           Table
  ---------------- ----------------
  Authentication   users
  Roles            roles
  Categories       categories
  Brands           brands
  Products         products
  Product Images   product_images
  Discounts        discounts
  Coupons          coupons
  Coupon Usage     coupon_usages
  Wishlists        wishlists
  Wishlist Items   wishlist_items
  Carts            carts
  Cart Items       cart_items
  Orders           orders
  Order Items      order_items
  Payments         payments
  Addresses        addresses
  Reviews          reviews
  Notifications    notifications
  Activity Logs    activity_logs

------------------------------------------------------------------------

# Technology Stack

-   **Backend:** Laravel 13
-   **Frontend:** Blade, Tailwind CSS, Alpine.js (Optional)
-   **Database:** MySQL
-   **Authentication:** Laravel Breeze
-   **Payment Gateway:** Midtrans
-   **PDF Generator:** Laravel DomPDF
-   **Image Storage:** Laravel Storage
-   **Queue:** Laravel Queue (Optional)
-   **Scheduler:** Laravel Task Scheduler

------------------------------------------------------------------------

# Expected Outcome

Sistem menghasilkan platform e-commerce berbasis web yang mampu
menangani pengelolaan produk, transaksi, pembayaran online, analitik
penjualan, pengelolaan pelanggan, serta otomatisasi proses bisnis
seperti penjadwalan diskon dan perhitungan rating produk. Arsitektur
dibuat modular sehingga mudah dikembangkan untuk fitur lanjutan seperti
marketplace, integrasi jasa pengiriman, maupun aplikasi mobile.
