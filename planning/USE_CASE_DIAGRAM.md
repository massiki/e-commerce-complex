# Use Case Diagram - E-Commerce Platform

Dokumen ini berisi rancangan Use Case Diagram untuk aktor **Admin** dan
**Customer**.

------------------------------------------------------------------------

# Admin

## Diagram (Konseptual)

``` text
Admin
├── Login
├── Dashboard
│   ├── Revenue
│   ├── Orders
│   ├── Customers
│   ├── Best Selling Products
│   └── Low Stock Warning
├── Product Management
│   ├── CRUD Product
│   ├── Upload Multiple Images
│   ├── Manage Stock
│   ├── Soft Delete / Restore
│   └── Discount Scheduler
├── Category Management
├── Brand Management
├── Coupon Management
├── Order Management
│   ├── View Order
│   ├── View Detail
│   └── Update Status
├── Customer Management
├── Review Management
└── Activity Log
```

## Use Cases

-   Login
-   View Dashboard
-   CRUD Product
-   Upload Multiple Product Images
-   Manage Product Stock
-   Soft Delete Product
-   Restore Product
-   CRUD Category
-   CRUD Brand
-   CRUD Coupon
-   Schedule Product Discount
-   View Orders
-   Update Order Status
-   View Customer List
-   View Customer Detail
-   View Purchase History
-   View Product Reviews
-   View Product Ratings
-   View Activity Logs

------------------------------------------------------------------------

# Customer

## Diagram (Konseptual)

``` text
Customer
├── Register
├── Login
├── Dashboard
├── Browse Products
│   ├── Search
│   ├── Filter
│   └── View Detail
├── Wishlist
├── Shopping Cart
├── Address Management
├── Checkout
│   ├── Apply Coupon
│   ├── Midtrans
│   └── COD
├── Orders
│   ├── View Detail
│   ├── Payment History
│   ├── Download Invoice PDF
│   └── Review Product
└── Notifications
```

## Use Cases

-   Register
-   Login
-   View Dashboard
-   Browse Products
-   Search Products
-   Filter Products
-   View Product Detail
-   Add Product to Wishlist
-   Remove Product from Wishlist
-   Add Product to Cart
-   Update Cart Quantity
-   Remove Product from Cart
-   Create Address
-   Update Address
-   Delete Address
-   Checkout
-   Apply Coupon
-   Pay with Midtrans
-   Pay with COD
-   View Orders
-   View Order Detail
-   View Payment History
-   Download PDF Invoice
-   Give Rating
-   Write Review
-   View Notifications
-   Read Notifications

------------------------------------------------------------------------

# Actors

-   Admin
-   Customer
