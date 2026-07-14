# Activity Diagram

## E-Commerce Platform

Dokumen ini berisi Activity Diagram utama berdasarkan Project Brief,
ERD, dan Use Case Diagram.

------------------------------------------------------------------------

# 1. Activity Diagram Login

``` text
Start
  │
Input Email & Password
  │
Validate Credentials
  │
┌───────────────────┐
│ Credentials Valid?│
└───────┬───────────┘
        │Yes
        ▼
Load Role
        │
Open Dashboard
        │
End

        No
        │
Display Error
        │
Back to Login
```

------------------------------------------------------------------------

# 2. Activity Diagram Product Management (Admin)

``` text
Start
 │
Login
 │
Open Product Menu
 │
Select Action
 │
 ├─ Create Product
 ├─ Update Product
 ├─ Soft Delete Product
 ├─ Restore Product
 ├─ Upload Images
 ├─ Update Stock
 └─ Manage Discount
 │
Validate Data
 │
Save Database
 │
Record Activity Log
 │
End
```

------------------------------------------------------------------------

# 3. Activity Diagram Checkout

``` text
Start
 │
Login
 │
Browse Product
 │
Add to Cart
 │
Apply Coupon (Optional)
 │
Checkout
 │
Select Address
 │
Calculate Total
 │
Select Payment Method
      │
 ┌────┴────┐
 │         │
Midtrans  COD
 │         │
Payment   Create Order
Success   Pending
 │         │
Create Order Snapshot
 │
Create Order Item Snapshot
 │
Reduce Product Stock
 │
Create Payment Record
 │
Send Notification
 │
End
```

------------------------------------------------------------------------

# 4. Activity Diagram Order Management (Admin)

``` text
Start
 │
Login
 │
Open Orders
 │
Select Order
 │
View Detail
 │
Update Status
 │
Pending
 │
Paid
 │
Processing
 │
Shipped
 │
Completed / Cancelled
 │
Save Status
 │
Send Notification
 │
End
```

------------------------------------------------------------------------

# 5. Activity Diagram Product Review

``` text
Start
 │
Login
 │
Open Completed Order
 │
Select Product
 │
Input Rating
 │
Input Review
 │
Save Review
 │
Recalculate Product Rating
 │
End
```

------------------------------------------------------------------------

# 6. Activity Diagram Discount Scheduler

``` text
Start
 │
Admin Set Discount
 │
Set Start Date
 │
Set End Date
 │
Scheduler Running
 │
Start Time?
 │
Yes
 │
Apply Discount
 │
End Time?
 │
Yes
 │
Restore Normal Price
 │
End
```

------------------------------------------------------------------------

# 7. Activity Diagram Midtrans Payment

``` text
Start
 │
Checkout
 │
Generate Transaction
 │
Redirect to Midtrans
 │
Customer Payment
 │
Midtrans Callback
 │
Update Payment Status
 │
Update Order Status
 │
Create Notification
 │
End
```

------------------------------------------------------------------------

# Ringkasan

  No   Activity Diagram     Actor
  ---- -------------------- -----------------
  1    Login                Admin, Customer
  2    Product Management   Admin
  3    Checkout             Customer
  4    Order Management     Admin
  5    Product Review       Customer
  6    Discount Scheduler   Admin
  7    Midtrans Payment     Customer
