# Sequence Diagram

## E-Commerce Platform

Dokumen ini berisi Sequence Diagram utama berdasarkan Project Brief,
ERD, Use Case Diagram, dan Activity Diagram.

------------------------------------------------------------------------

# 1. Login

``` text
User -> Login Page : Input email & password
Login Page -> Auth Controller : Submit
Auth Controller -> Database : Verify credentials
Database --> Auth Controller : Valid / Invalid
Auth Controller --> User : Dashboard / Error Message
```

------------------------------------------------------------------------

# 2. Product Management (Admin)

``` text
Admin -> Product Page : Create / Update Product
Product Page -> Product Controller : Submit Data
Product Controller -> Database : Save Product
Product Controller -> Storage : Upload Images
Storage --> Product Controller : Success
Product Controller -> Activity Log : Record Activity
Product Controller --> Admin : Success Response
```

------------------------------------------------------------------------

# 3. Checkout

``` text
Customer -> Cart : Checkout
Cart -> Checkout Controller : Request Checkout
Checkout Controller -> Address : Validate Address
Checkout Controller -> Coupon : Validate Coupon
Checkout Controller -> Order : Create Order Snapshot
Checkout Controller -> Order Item : Create Product Snapshot
Checkout Controller -> Product : Reduce Stock
Checkout Controller -> Payment : Create Payment
Checkout Controller --> Customer : Select Payment
```

------------------------------------------------------------------------

# 4. Midtrans Payment

``` text
Customer -> Checkout : Choose Midtrans
Checkout -> Midtrans : Create Transaction
Midtrans --> Customer : Payment Page
Customer -> Midtrans : Complete Payment
Midtrans -> Webhook : Callback
Webhook -> Payment : Update Payment Status
Webhook -> Order : Update Order Status
Webhook -> Notification : Create Notification
Webhook --> Customer : Payment Success
```

------------------------------------------------------------------------

# 5. COD Checkout

``` text
Customer -> Checkout : Choose COD
Checkout -> Order : Create Order
Checkout -> Order Item : Save Snapshot
Checkout -> Payment : Payment Pending
Checkout -> Notification : Create Notification
Checkout --> Customer : Order Created
```

------------------------------------------------------------------------

# 6. Order Management

``` text
Admin -> Order Page : Open Order
Order Page -> Order Controller : Update Status
Order Controller -> Database : Save Status
Order Controller -> Notification : Notify Customer
Order Controller --> Admin : Success
```

------------------------------------------------------------------------

# 7. Product Review

``` text
Customer -> Order History : Open Completed Order
Customer -> Review Form : Give Rating & Review
Review Form -> Review Controller : Submit
Review Controller -> Database : Save Review
Review Controller -> Product : Recalculate Rating
Review Controller --> Customer : Review Saved
```

------------------------------------------------------------------------

# Summary

  No   Sequence Diagram     Actors
  ---- -------------------- --------------------
  1    Login                Admin, Customer
  2    Product Management   Admin
  3    Checkout             Customer
  4    Midtrans Payment     Customer, Midtrans
  5    COD Checkout         Customer
  6    Order Management     Admin
  7    Product Review       Customer
