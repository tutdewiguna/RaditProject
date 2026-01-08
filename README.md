# OutfiTR - Modern E-Commerce Solution

A robust, full-stack e-commerce application built with **CodeIgniter 4**. This project features a high-performance customer frontend with a minimalist "Uniqlo-inspired" design and a comprehensive, professional admin dashboard for store management.

## 🚀 Key Features

### Frontend (Customer Store)
*   **Minimalist Design**: Clean, whitespace-driven UI focused on product presentation.
*   **Responsive**: Fully optimized for mobile, tablet, and desktop.
*   **Product Browsing**: New arrivals, categories, and search functionality.
*   **Shopping Cart**: Session-based cart management.
*   **Checkout**: Streamlined checkout process (Cash on Delivery / Direct Transfer).
*   **News & Articles**: Content section for brand updates.

### Backend (Admin Panel)
*   **Professional Dashboard**: Key metrics (Orders, Revenue, Stock) at a glance.
*   **Product Management**: Create, edit, delete products with image uploads and stock tracking.
*   **Order Management**: View order details, items, and update status (Pending, Completed, Cancelled).
*   **Content Management**: Manage news articles and blog posts.
*   **Role-Based Access**: Secure admin authentication separated from customer logins.
*   **Auto-Migrations**: Development-friendly automatic database migration runner on server start.

---

## 🛠️ Technology Stack

*   **Framework**: [CodeIgniter 4.x](https://codeigniter.com/)
*   **Language**: PHP 8.1+
*   **Database**: MySQL / MariaDB
*   **Frontend**: HTML5, Vanilla CSS (Custom Design System), Vanilla JS, Bootstrap 4/5 (Utilities).
*   **Icons**: Bootstrap Icons, FontAwesome.

---

## ⚙️ Installation & Setup

### Prerequisites
*   PHP 8.1 or higher
*   Composer installed globally
*   XAMPP/WAMP/MAMP (for MySQL database)

### 1. Clone the Repository
```bash
git clone https://github.com/tutdewiguna/RaditProject.git
cd RaditProject
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Environment Configuration
Copy the example environment file and configure it:
```bash
cp env .env
```
Open `.env` and set your database credentials and base URL:
```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = outfit_db
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi

# Enable Auto-Migrations (Development Only)
AUTO_MIGRATE = true
```

### 4. Database Setup
Create a local database named `outfit_db`. 
*   **Option A (Automatic):** If `AUTO_MIGRATE=true` is set in `.env`, simply run the server (step 5), and tables will be created automatically.
*   **Option B (Manual):** Run the migration command:
    ```bash
    php spark migrate
    ```

### 5. Run the Application
Start the local development server:
```bash
php spark serve
```
Access the application at `http://localhost:8080`.

---

## 🔐 Admin Access

To access the admin panel, navigate to:
`http://localhost:8080/admin`

*   **Registration**: First-time setup allows you to register a new admin account via the "Register" link on the login page.
*   **Login**: Use your registered credentials.

---

## 📂 Project Structure

This project uses a **HMVC-style Modular Structure** for better organization:

```text
app/
├── Modules/
│   ├── Backend/        # Admin Panel Controllers & Views
│   │   ├── Controllers/
│   │   ├── Views/
│   │   └── Config/
│   │
│   └── Frontend/       # Public Store Controllers & Views
│       ├── Controllers/
│       ├── Views/
│       └── Config/
│
├── Libraries/          # Custom Libraries (e.g., AutoMigration)
├── Models/             # Database Models (Shared)
├── Filters/            # Middleware (AdminAuthFilter, etc.)
└── Config/             # Global Configuration (Routes, Database, etc.)
```

## 🤝 Contributing

1.  Fork the repository.
2.  Create your feature branch (`git checkout -b feature/AmazingFeature`).
3.  Commit your changes (`git commit -m 'Add some AmazingFeature'`).
4.  Push to the branch (`git push origin feature/AmazingFeature`).
5.  Open a Pull Request.

---

**Developed with ❤️ by TutDe Wiguna**
