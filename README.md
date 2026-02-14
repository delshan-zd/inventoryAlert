# 📦 InventoryAlert

A real-time inventory alert system built with Laravel 12 that tracks product stock levels, sends instant low-stock alerts, and provides transaction history with PDF export.

---

## ✨ Features

- **Real-time Stock Updates** — Stock changes reflect instantly across all connected users without page refresh
- **Low Stock Alerts** — Automatic alerts when a product's stock falls below its defined threshold
- **Live Search** — Search products by name in real-time with debouncing
- **Notification System** — Bell icon with badge showing all stock and alert events
- **Transaction History** — Full log of all stock-in and stock-out operations
- **PDF Report Export** — Generate and download transaction reports with optional date range filter
- **Authentication** — Secure login and registration via Laravel Breeze

---

## 📸 Screenshots

### Products List
![Products List](screenshots/products_list.png)


### Transactions Report
![Transactions Report](screenshots/Transactions_Report.png)

---

## 🛠 Tech Stack

| Technology | Purpose |
|---|---|
| Laravel 12 | Backend framework |
| Laravel Reverb | WebSocket server for real-time broadcasting |
| Laravel Echo | JavaScript client for real-time events |
| Laravel Breeze | Authentication scaffolding |
| SQLite | Database |
| TailAdmin | UI component library (Tailwind CSS) |
| SweetAlert2 | User-friendly flash notifications |
| DomPDF | PDF report generation |
| Vite | Frontend asset bundling |

---

## ⚙️ Requirements

- PHP 8.3+
- Composer 2.9+
- Node.js & NPM
- SQLite

---

## 🚀 Installation

**1. Clone the repository:**
```bash
git clone https://github.com/your-username/inventoryAlert.git
cd inventoryAlert
```

**2. Install PHP dependencies:**
```bash
composer install
```

**3. Install Node dependencies:**
```bash
npm install
```

**4. Set up environment:**
```bash
cp .env.example .env
php artisan key:generate
```

**5. Create the database:**
```bash
touch database/database.sqlite
```

**6. Run migrations:**
```bash
php artisan migrate
```

---

## ▶️ Running the App

You need **3 terminals** running simultaneously:

**Terminal 1 — Laravel server:**
```bash
php artisan serve
```

**Terminal 2 — Vite assets:**
```bash
npm run dev
```

**Terminal 3 — Reverb WebSocket server:**
```bash
php artisan reverb:start
```

Then visit: [http://localhost:8000](http://localhost:8000)

---

## 📁 Project Structure

```
app/
├── Events/
│   ├── ProductStockUpdated.php    # Broadcast stock changes
│   └── LowStockAlert.php         # Broadcast low stock alerts
├── Listeners/
│   ├── StoreStockUpdateNotification.php
│   └── StoreLowStockNotification.php
├── Http/Controllers/
│   ├── ProductController.php
│   ├── TransactionController.php
│   ├── ReportController.php
│   └── NotificationController.php
└── Models/
    ├── Product.php
    ├── Transaction.php
    └── Notification.php
```

---

## 👤 Author

**Delshan Zada**

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
