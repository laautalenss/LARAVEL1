# Project Overview

This is a Laravel 12 web application designed for managing a collection of books ("Libros"). It provides a comprehensive interface for creating, reading, updating, and deleting book records. The system also includes user authentication and role-based access control.

## Key Features

- **Book Management:** Complete CRUD operations for books, including fields for Title, Author, Year, Genre, and Description.
- **User Authentication:** Secure login and registration system using Laravel Breeze.
- **Role Management:** Integrated role-based permissions using `spatie/laravel-permission`.
- **Admin Dashboard:** Dedicated area for administrative tasks.
- **Modern Frontend:** Responsive UI built with Tailwind CSS, Alpine.js, and Vite.

## Technical Architecture

- **Framework:** Laravel 12 (PHP 8.2+)
- **Database:** MySQL
- **Frontend Stack:**
    - Vite (Build Tool)
    - Tailwind CSS (Styling)
    - Alpine.js (Interactivity)
- **Key Models:**
    - `Libro`: The core resource representing a book.
    - `User`: The authenticated user model, extending standard Laravel auth with Spatie roles.
    - `Usuario`: A secondary user entity (appears to be for specific business logic or experimental use).
- **Key Controllers:**
    - `LibroController`: Handles all logic for book management.
    - `UsuarioController`: Handles logic for the `Usuario` entity.

# Building and Running

## Prerequisites

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL

## Setup

To set up the project for the first time, run the automated setup script:

```bash
composer run setup
```

This command performs the following actions:

1.  Installs PHP dependencies via Composer.
2.  Sets up the `.env` file (if missing).
3.  Generates the application key.
4.  Runs database migrations.
5.  Installs Node.js dependencies.
6.  Builds frontend assets.

## Development Server

To start the development environment (Laravel server + Vite + Queue Worker):

```bash
composer run dev
```

Access the application at: `http://localhost:8000`

## Testing

Run the automated test suite using PHPUnit:

```bash
composer run test
```

# Development Conventions

- **Coding Style:** Adheres to PSR-12. Use `laravel/pint` for formatting:
    ```bash
    ./vendor/bin/pint
    ```
- **Routing:** Web routes are defined in `routes/web.php`. Most routes are protected by the `auth` middleware.
- **Security:** Ensure all new controllers and routes are properly protected using middleware and policies.

# Estructura de urls
