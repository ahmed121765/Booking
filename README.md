# Booking — Business Listing & Booking Platform

A feature-rich web application built with **Laravel** that enables users to discover business listings by category and location, while providing listing owners with tools to manage their listings, schedules, media, and subscription packages.

The platform includes a dedicated administration dashboard for managing platform content, users, permissions, listing approvals, featured listings, and payment-related workflows.

## Overview

Booking is designed to bring visitors, listing owners, and administrators together in one centralized platform. It combines listing discovery, owner management tools, role-based access control, subscription packages, and online payment integrations in a structured web application.

## Key Features

### Public Listing Platform
- Browse business listings by category and location.
- View detailed listing pages and available information.
- Discover featured listings.
- Submit inquiries through the contact form.

### User Account Management
- User registration and authentication.
- Profile management and password updates.
- Social sign-in integration.
- Dedicated owner dashboard.

### Listing Management
- Create and manage business listings.
- Manage listing schedules and related information.
- Upload and manage listing images and videos.
- Organize listings by categories, locations, and amenities.
- Support listing approval workflows.
- Control featured-listing status.

### Administration Dashboard
- Manage listings and listing submissions.
- Manage categories, locations, and amenities.
- Manage users and their access.
- Manage roles and permissions.
- Review and approve listings.
- Control featured listings and platform content.

### Packages & Payments
- Manage listing packages and subscriptions.
- Support checkout workflows.
- Integrate PayPal and Stripe for online payments.
- Configure payment credentials through environment settings.

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP 8.1+ | Backend programming language |
| Laravel 10 | Backend framework |
| Blade | Server-rendered templates |
| MySQL | Relational database |
| Tailwind CSS | Utility-first styling |
| Alpine.js | Lightweight frontend interactions |
| Vite | Frontend asset development and bundling |
| Composer | PHP dependency management |
| npm | JavaScript dependency management |
| PayPal & Stripe | Payment integrations |

## Application Architecture

The application follows Laravel's MVC (Model–View–Controller) architecture to separate application responsibilities.

- **Models:** Represent application data and database interactions.
- **Views:** Render the user interface using Blade templates.
- **Controllers:** Handle incoming requests and coordinate application logic.
- **Middleware:** Apply request filtering and access restrictions where configured.
- **Authentication & Authorization:** Control access to protected areas according to the application's configuration.

## Requirements

Before installing the application, make sure you have:

- PHP 8.1 or later, compatible with the project's dependencies.
- Composer.
- Node.js and npm.
- MySQL or another database supported by Laravel.
- Git.

## Getting Started

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-folder>
```

Replace the placeholders with your actual repository URL and project directory.

### 2. Install Backend Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

Create your local environment file.

**Windows Command Prompt:**

```cmd
copy .env.example .env
```

**macOS / Linux:**

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Configure the Database

Create a database for the project, then update the relevant values in `.env`.

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

Use the credentials configured for your local database. Never use development settings such as `APP_DEBUG=true` in a production environment.

### 5. Run Database Migrations

```bash
php artisan migrate
```

If the repository includes seeders and they are required for initial data, run:

```bash
php artisan db:seed
```

### 6. Install Frontend Dependencies

```bash
npm install
npm run build
```

### 7. Start the Application

```bash
php artisan serve
```

Visit:

**http://127.0.0.1:8000**

For frontend development with live asset updates, run the following command in a separate terminal:

```bash
npm run dev
```

## Payment Integration

The platform includes PayPal and Stripe payment support.

To configure payment functionality:

1. Obtain the required credentials from the relevant payment provider.
2. Add the required environment variables to `.env`.
3. Configure the payment settings according to the implementation.
4. Test payment flows using the providers' sandbox or test environments before using live credentials.

**Security note:** Never publish secret API keys, payment credentials, or production configuration in your GitHub repository.

## Testing

Run the Laravel test suite with:

```bash
php artisan test
```

The available test coverage depends on the tests included in the repository.

## Useful Artisan Commands

Clear cached application configuration and routes:

```bash
php artisan optimize:clear
```

Inspect registered routes:

```bash
php artisan route:list
```

Build production frontend assets:

```bash
npm run build
```

## Security Considerations

- Keep `.env` out of version control.
- Provide `.env.example` without real credentials.
- Use appropriate authentication and authorization for protected operations.
- Validate incoming data before processing it.
- Protect payment workflows and verify payment results on the server side.
- Disable debug mode in production.
- Keep PHP and Composer dependencies updated.

## Project Goals

This project demonstrates practical Laravel development concepts, including:

- Building a database-driven web application.
- Organizing application code using MVC.
- Implementing listing and content management workflows.
- Managing user access and administrative permissions.
- Integrating subscription and payment workflows.
- Developing a structured dashboard for platform administration.

## Author

**Ahmed Ashraf**

Laravel Backend Developer | Computer Science Student

- GitHub: [@ahmed121765](https://github.com/ahmed121765)

---

*Built with Laravel and PHP.*
