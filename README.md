# 👜 ReCrafted-Ecommerce

> **A full-stack PHP e-commerce platform for buying and reselling pre-owned luxury items** — featuring product listings, user authentication, a shopping cart, and a complete checkout flow.

![PHP](https://img.shields.io/badge/PHP-Backend-777BB4?style=flat&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat&logo=mysql&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-Frontend-E34F26?style=flat&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-Styling-1572B6?style=flat&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-Interactivity-F7DF1E?style=flat&logo=javascript&logoColor=black)

---

## 🧠 What is ReCrafted-Ecommerce?

**ReCrafted-Ecommerce** is a full-stack e-commerce web application built for the resale of luxury goods — currently featuring **Watches** and **Bags**. It supports user registration and login, product browsing by category, cart management, and a multi-step billing and checkout system — all backed by a MySQL database and PHP session management.

Built as a BCA-level full-stack project, it covers the complete lifecycle of an e-commerce transaction from product discovery to order placement.

---

## ✨ Features

- 🔐 **User Authentication** — signup, login, and session-based route protection
- 🛍️ **Product Catalogue** — category-based browsing (Watches, Bags) with product detail pages
- 🛒 **Shopping Cart** — add items, remove items, view subtotal (persisted per user in DB)
- 💳 **Checkout & Billing** — collect shipping/billing details and convert cart to orders
- 📦 **Order Management** — cart items saved to `orders` table on successful checkout
- 📬 **Contact Page** — static contact form with business details
- 📱 **Responsive Layout** — mobile-friendly UI with FontAwesome icons

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Frontend** | HTML5, CSS3, JavaScript |
| **Backend** | PHP (procedural + MySQLi) |
| **Database** | MySQL |
| **Icons** | FontAwesome 5 Pro |
| **Session Handling** | PHP Sessions |
| **Server** | Apache (XAMPP / WAMP) |

---

## 🗄️ Database Schema

| Table | Purpose |
|---|---|
| `users` | Stores registered user accounts |
| `shop` | Product catalogue (name, price, image, category) |
| `cart` | Per-user cart items (product_id, quantity, price, total) |
| `billing_detail` | Shipping/billing address per order |
| `orders` | Final placed orders (linked to user + products) |

---

## 🔬 Application Flow

```
User visits index.php
        │
        ▼
  Session check → redirect to login5.php if not logged in
        │
        ▼
  Browse products by category
  (watch.php / bag.php)
        │
        ▼
  Add to Cart → stored in MySQL cart table
        │
        ▼
  cart.php — view items, subtotal, remove items
        │
        ▼
  billing.php — enter shipping details
        │
        ▼
  checkout.php
  ├── Save billing details → billing_detail table
  ├── Convert cart items → orders table
  └── Clear cart → redirect to index.php
```

---

## 📁 Project Structure

```
ReCrafted-Ecommerce/
├── index.php              # Homepage — hero banner + featured products
├── watch.php              # Watches product listing
├── bag.php                # Bags product listing
├── product_detail.php     # Individual product page
├── cart.php               # Shopping cart view + subtotal
├── add_to_cart.php        # Add item to cart (backend logic)
├── delete_cart_item.php   # Remove item from cart
├── billing.php            # Billing form page
├── checkout.php           # Order processing + DB writes
├── login5.php             # User login page
├── signup5.php            # User registration page
├── contact.php            # Contact page
├── about.html             # About page
├── CSS/                   # Stylesheets
├── JavaScript/            # Client-side scripts
├── img/                   # Product images and assets
└── README.md
```

---

## 🚀 Getting Started

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) or any Apache + MySQL + PHP stack
- PHP 7.4+

### Setup

```bash
# 1. Clone the repository
git clone https://github.com/Corerishi/ReCrafted-Ecommerce.git

# 2. Move to your web server's root directory
# For XAMPP: move to C:/xampp/htdocs/ReCrafted-Ecommerce
# For WAMP:  move to C:/wamp64/www/ReCrafted-Ecommerce
```

### Database Setup

1. Open **phpMyAdmin** → Create a new database named `ReCrafted-Ecommerce`
2. Import the SQL schema (create tables: `users`, `shop`, `cart`, `billing_detail`, `orders`)
3. Update DB credentials in each PHP file if needed:
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ReCrafted-Ecommerce";
```

### Run

Start Apache and MySQL from XAMPP, then visit:
```
http://localhost/ReCrafted-Ecommerce/index.php
```

---

## 📚 Concepts Demonstrated

- **Full-stack PHP development** — server-side rendering with MySQLi
- **Session-based authentication** — login state persisted across pages
- **Relational database design** — normalized tables with JOINs (cart ↔ shop)
- **E-commerce cart logic** — per-user cart state, quantity tracking, subtotal calculation
- **Form handling & sanitization** — `real_escape_string` for basic SQL safety
- **Multi-page application flow** — end-to-end from product browse to order confirmation

---

## 👨‍💻 Author

**Rishi Raj**  
BCA → MCA — CHRIST (Deemed to be University)  
[LinkedIn](https://linkedin.com/in/rishi-raj-9110a824a) · [GitHub](https://github.com/Corerishi)

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).
