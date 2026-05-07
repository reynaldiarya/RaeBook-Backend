# RaeBook Backend

A robust and secure API backend for managing digital libraries and user reading collections.

<p align="center">
  <img src="https://img.shields.io/badge/version-1.0.0-blue.svg" />
  <img src="https://img.shields.io/badge/Laravel-10.x-FF2D20.svg" />
  <a href="LICENSE">
    <img alt="License" src="https://img.shields.io/badge/license-MIT-yellow.svg" target="_blank" />
  </a>
</p>

## Description

RaeBook Backend is a high-performance RESTful API built with the Laravel framework. It provides secure user authentication via Laravel Sanctum and serves as the core data engine for digital book platforms. The application enables users to browse available literature, manage personal reading libraries, and update profile configurations seamlessly. It is designed to be scalable and secure, offering a solid foundation for mobile or web-based reading clients.

## Features

- **Secure Authentication** - Token-based user registration, login, and secure logout mechanisms using Laravel Sanctum
- **Personal Library Management** - Add or remove reading material from personal user collections
- **Profile Customization** - Update user profile information including profile avatars securely
- **Book Discovery** - Retrieve comprehensive catalogs of available books and specific personal collections
- **Standardized API Responses** - Consistent JSON response structures tailored for smooth client integration
- **Modern Asset Bundling** - Integrated Vite and Tailwind CSS configuration for web-based views and administrative dashboards

## Tech Stack

- **Backend Framework**: Laravel 10 (PHP 8.1+)
- **Authentication**: Laravel Sanctum
- **Frontend Toolkit**: Vite 8, Tailwind CSS 4, Alpine.js
- **Database ORM**: Eloquent (MySQL / MariaDB support)
- **HTTP Client**: GuzzleHTTP

## Installation

### Prerequisites

- PHP 8.1 or higher
- Composer 2.0 or higher
- Node.js 18 or higher
- MySQL 8.0+ or MariaDB 10.6+

### Steps

1. Clone the repository to your local machine

```bash
git clone https://github.com/reynaldiarya/RaeBook-Backend.git
cd RaeBook-Backend
```

2. Install PHP dependencies

```bash
composer install
```

3. Install Node.js dependencies

```bash
npm install
```

4. Set up the environment configuration

```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database credentials in the `.env` file (see Configuration section)

6. Run the database migrations

```bash
php artisan migrate
```

7. Start the local development server

```bash
php artisan serve
```

The application will be accessible at `http://localhost:8000`.

## Configuration

The application relies on the `.env` file for core configuration. Ensure the following database variables are correctly mapped to your local or production database server.

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_URL` | Base application URL | `http://localhost:8000` |
| `DB_CONNECTION` | Database driver | `mysql` |
| `DB_HOST` | Database host address | `127.0.0.1` |
| `DB_PORT` | Database port | `3306` |
| `DB_DATABASE` | Target database name | `raebook_db` |
| `DB_USERNAME` | Database username | `root` |
| `DB_PASSWORD` | Database password | `secret` |

## Usage

The API endpoints are grouped under the `/api` prefix. Most library management endpoints require an authentication token passed via the Authorization header.

### Authentication

**Login Request**
```http
POST /api/login
Content-Type: application/json

{
  "email": "user@example.com",
  "password": "password123"
}
```

**Register Request**
```http
POST /api/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "user@example.com",
  "password": "password123"
}
```

### Library Management

**Get All Books**
```http
GET /api/book
Authorization: Bearer {your_token}
```

**Get My Books**
```http
GET /api/my-book
Authorization: Bearer {your_token}
```

**Add Book to Collection**
```http
POST /api/add-book
Authorization: Bearer {your_token}
Content-Type: application/json

{
  "user_id": 1,
  "book_id": 5
}
```

**Remove Book from Collection**
```http
POST /api/remove-book
Authorization: Bearer {your_token}
Content-Type: application/json

{
  "user_id": 1,
  "book_id": 5
}
```

## Project Structure

```text
/
├── app/
│   ├── Http/Controllers/   # API and Web route controllers
│   ├── Http/Resources/     # API JSON response transformers
│   └── Models/             # Eloquent database models
├── bootstrap/              # Framework bootstrapping and caching
├── config/                 # Application configuration files
├── database/
│   ├── factories/          # Model factories for testing
│   ├── migrations/         # Database schema definitions
│   └── seeders/            # Database seed scripts
├── public/                 # Publicly accessible assets and entry point
├── resources/              # Frontend assets, views, and Tailwind configurations
├── routes/                 # Route definitions (api.php, web.php, auth.php)
└── tests/                  # Automated test suites
```

## Scripts / Commands

| Command | Description |
|---------|-------------|
| `composer install` | Install all required PHP dependencies |
| `npm run dev` | Start the Vite development server for frontend assets |
| `npm run build` | Compile and minify frontend assets for production |
| `php artisan migrate` | Execute pending database migrations |
| `php artisan serve` | Boot the built-in PHP development server |
| `php artisan route:list` | View all registered application endpoints |

## Contributing

Contributions are welcome. To contribute:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/your-feature-name`)
3. Commit your changes (`git commit -m 'Add specific feature'`)
4. Push to the branch (`git push origin feature/your-feature-name`)
5. Open a Pull Request

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for detailed terms and conditions.

## Author

Reynaldi Arya