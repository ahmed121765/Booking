<div align="center">

# 🏨 Booking — Business Listing & Booking Platform

**A full-featured Laravel platform for discovering, managing, and monetizing business listings.**

![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-Styling-06B6D4?logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-Frontend-8BC0D0?logo=alpinedotjs&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-Bundler-646CFF?logo=vite&logoColor=white)
![Stripe](https://img.shields.io/badge/Stripe-Payments-635BFF?logo=stripe&logoColor=white)
![PayPal](https://img.shields.io/badge/PayPal-Payments-00457C?logo=paypal&logoColor=white)

</div>

---

## 📑 Table of Contents

- [About the Project](#-about-the-project)
- [Key Features](#-key-features)
- [Screenshots](#-screenshots)
- [Tech Stack](#-tech-stack)
- [Architecture](#-architecture)
- [User Roles](#-user-roles)
- [Getting Started](#-getting-started)
- [Environment Variables](#-environment-variables)
- [Payment Integration](#-payment-integration)
- [Testing](#-testing)
- [Useful Commands](#-useful-commands)
- [Security](#-security)
- [Roadmap](#-roadmap)
- [Contributing](#-contributing)
- [Author](#-author)

---

## 📖 About the Project

**Booking** brings visitors, listing owners, and administrators together in one centralized platform.

- **Visitors** browse and search business listings by category and location.
- **Owners** create listings, manage schedules and media, and subscribe to packages.
- **Admins** moderate content, approve listings, manage users and permissions, and control featured placements.

It combines listing discovery, owner tools, role-based access control, subscription packages, and online payments in a clean MVC architecture.

---

## ✨ Key Features

### 🌍 Public Platform
- Browse listings by **category** and **location**
- Detailed listing pages (info, schedule, gallery, amenities)
- **Featured listings** highlighted to visitors
- Contact form for inquiries

### 👤 Accounts & Authentication
- Registration, login, and logout
- Profile management and password updates
- **Social sign-in** integration
- Dedicated **owner dashboard**

### 🏢 Listing Management (Owners)
- Create, edit, and manage business listings
- Manage opening **schedules**
- Upload **images and videos**
- Assign categories, locations, and **amenities**
- Submit listings for admin approval

### 🛠️ Admin Dashboard
- Manage listings and listing submissions
- **Approve / reject** listings
- Manage categories, locations, and amenities
- Manage users and their access
- **Roles & permissions** (role-based access control)
- Control **featured listings** and platform content

### 💳 Packages & Payments
- Listing **packages and subscriptions**
- Checkout workflow
- **Stripe** and **PayPal** integration
- Payment credentials configured via environment variables

---

## 🖼️ Screenshots

> Add your screenshots to a `docs/screenshots/` folder and update the paths below.

| Home Page | Listing Details |
|---|---|
| ![Home](docs/screenshots/home.png) | ![Listing](docs/screenshots/listing.png) |

| Owner Dashboard | Admin Dashboard |
|---|---|
| ![Owner](docs/screenshots/owner-dashboard.png) | ![Admin](docs/screenshots/admin-dashboard.png) |

---

## 🧰 Tech Stack

| Technology | Purpose |
|---|---|
| **PHP 8.1+** | Backend language |
| **Laravel 10** | Backend framework |
| **Blade** | Server-rendered templates |
| **MySQL** | Relational database |
| **Tailwind CSS** | Utility-first styling |
| **Alpine.js** | Lightweight frontend interactivity |
| **Vite** | Asset bundling and dev server |
| **Composer** | PHP dependency management |
| **npm** | JavaScript dependency management |
| **Stripe & PayPal** | Online payments |

---

## 🏗️ Architecture

The project follows Laravel's **MVC** pattern:

```
Request → Routes → Middleware → Controller → Model ⇄ Database
                                    ↓
                                  Blade View → Response
```

| Layer | Responsibility |
|---|---|
| **Models** | Represent data and handle database interaction |
| **Views** | Render the UI with Blade templates |
| **Controllers** | Handle requests and coordinate application logic |
| **Middleware** | Filter requests and enforce access restrictions |
| **Auth & Authorization** | Protect areas by user role and permission |

---

## 👥 User Roles

| Role | Capabilities |
|---|---|
| **Visitor** | Browse listings, view details, send inquiries |
| **Owner** | Manage own listings, media, schedules, and packages |
| **Admin** | Full control: approvals, users, roles, content, featured listings |

---

## 🚀 Getting Started

### Prerequisites

- PHP **8.1+**
- Composer
- Node.js and npm
- MySQL (or another Laravel-supported database)
- Git

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/ahmed121765/<repository-name>.git
cd <repository-name>
```

**2. Install backend dependencies**

```bash
composer install
```

**3. Create the environment file**

```bash
# macOS / Linux
cp .env.example .env

# Windows (Command Prompt)
copy .env.example .env
```

**4. Generate the application key**

```bash
php artisan key:generate
```

**5. Configure the database** in `.env` (see [Environment Variables](#-environment-variables)), then run:

```bash
php artisan migrate
php artisan db:seed   # only if the project includes seeders
```

**6. Install and build frontend assets**

```bash
npm install
npm run build
```

**7. Run the application**

```bash
php artisan serve
```

Open **http://127.0.0.1:8000** in your browser.

> 💡 For live asset reloading during development, run `npm run dev` in a separate terminal.

---

## ⚙️ Environment Variables

Core settings in `.env`:

```env
APP_NAME="Booking"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=booking
DB_USERNAME=root
DB_PASSWORD=
```

> ⚠️ Set `APP_ENV=production` and `APP_DEBUG=false` in production.

---

## 💳 Payment Integration

The platform supports **Stripe** and **PayPal**.

1. Create developer accounts with each provider.
2. Get your **sandbox/test** credentials.
3. Add them to `.env` using the variable names your code expects (example below).
4. Test the full checkout flow in sandbox mode.
5. Switch to live credentials only when going to production.

```env
# Example — adjust names to match your configuration
STRIPE_KEY=your_stripe_publishable_key
STRIPE_SECRET=your_stripe_secret_key

PAYPAL_MODE=sandbox
PAYPAL_CLIENT_ID=your_paypal_client_id
PAYPAL_SECRET=your_paypal_secret
```

> 🔒 **Never commit real API keys or secrets to GitHub.**

---

## 🧪 Testing

```bash
php artisan test
```

Test coverage depends on the tests included in the repository.

---

## 🔧 Useful Commands

| Command | Description |
|---|---|
| `php artisan optimize:clear` | Clear cached config, routes, and views |
| `php artisan route:list` | List all registered routes |
| `php artisan migrate:fresh --seed` | Rebuild the database from scratch (⚠️ deletes data) |
| `npm run dev` | Start Vite dev server |
| `npm run build` | Build production assets |

---

## 🔐 Security

- Keep `.env` out of version control
- Provide `.env.example` with **no real credentials**
- Validate all incoming data
- Enforce authentication and authorization on protected routes
- Verify payment results **on the server side**
- Disable debug mode in production
- Keep PHP and Composer dependencies up to date

---

## 🗺️ Roadmap

- [ ] Online booking and reservation system for listings
- [ ] Reviews and ratings
- [ ] Advanced search and filters
- [ ] Email notifications
- [ ] REST API
- [ ] Multi-language support
- [ ] Automated test coverage

---

## 🤝 Contributing

Contributions are welcome!

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/your-feature`
3. Commit your changes: `git commit -m "Add your feature"`
4. Push the branch: `git push origin feature/your-feature`
5. Open a Pull Request

---

## 👨‍💻 Author

**Ahmed Ashraf**
Laravel Backend Developer | Computer Science Student

[![GitHub](https://img.shields.io/badge/GitHub-ahmed121765-181717?logo=github)](https://github.com/ahmed121765)

---

<div align="center">

⭐ If you found this project useful, consider giving it a star!

*Built with Laravel and PHP.*

</div>
