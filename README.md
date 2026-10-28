# Booking System

A web platform for discovering and managing business listings. Visitors can browse listings by category and location, while listing owners can manage their listings and purchase packages through the platform.

## Features

- Browse listings and view detailed listing pages.
- Organize listings by categories and locations.
- User accounts with profile and password management.
- Owner dashboard for managing listings, schedules, images, and videos.
- Admin dashboard for managing listings, categories, locations, amenities, users, roles, and permissions.
- Listing approval and featured-listing controls.
- Package and subscription management.
- Checkout and payment support with PayPal and Stripe.
- Contact form for visitor inquiries.
- Social sign-in support.

## Tech Stack

- **Backend:** PHP 8.1+, Laravel 10
- **Frontend:** Blade, Tailwind CSS, Alpine.js
- **Build Tool:** Vite
- **Database:** MySQL or another database supported by Laravel

## Requirements

Make sure the following tools are installed:

- PHP 8.1 or later
- Composer
- Node.js and npm
- MySQL or another Laravel-supported database

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-folder>
```

Replace `<repository-url>` with your GitHub repository URL and `<project-folder>` with the project directory name.

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Create the Environment File

On macOS or Linux:

```bash
cp .env.example .env
```

On Windows Command Prompt:

```cmd
copy .env.example .env
```

### 4. Generate the Application Key

```bash
php artisan key:generate
```

### 5. Configure the Environment

Open the `.env` file and configure your database connection and other required settings.

Example database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=booking
DB_USERNAME=root
DB_PASSWORD=
```

Create the database before running the migrations. Update the values according to your local database configuration.

### 6. Run Database Migrations

```bash
php artisan migrate
```

If the project includes database seeders and requires initial data, run:

```bash
php artisan db:seed
```

Only run the seeders if they are configured for your project.

### 7. Install Frontend Dependencies

```bash
npm install
```

Build the frontend assets:

```bash
npm run build
```

### 8. Start the Development Server

```bash
php artisan serve
```

Open the URL displayed in your terminal, usually:

http://127.0.0.1:8000

## Payment Configuration

The platform supports PayPal and Stripe payment integration.

To enable online payments:

- Configure the required payment credentials.
- Add the necessary environment variables to `.env`.
- Configure the payment settings according to the application's implementation.
- Use sandbox or test mode credentials during development.

Never commit real API keys, passwords, or other sensitive credentials to the repository.

## Development

### Run the Frontend Development Server

To run Vite with live asset updates:

```bash
npm run dev
```

Keep the Vite development server running in a separate terminal while developing.

### Run Application Tests

```bash
php artisan test
```

### Clear Application Cache

If you encounter cached configuration or route issues, run:

```bash
php artisan optimize:clear
```

## Security

- Never commit the `.env` file to the repository.
- Keep API keys, passwords, and private credentials secure.
- Use `.env.example` to document the required environment variables without exposing sensitive values.
- Validate user input and apply appropriate authentication and authorization checks.
- Use test credentials for payment integrations during development.

## License

Specify the license under which this project is distributed. If no license has been selected, add one before publishing the project for reuse.

## Author

**Ahmed Ashraf**

Laravel Backend Developer | Computer Science Student

GitHub: [ahmed121765](https://github.com/ahmed121765)
