# Laravel Employee Management System

A simple **Employee Management System** built with **Laravel**, featuring authentication and employee management functionality.

## Tech Stack

- Laravel
- PHP
- MySQL
- Laravel Breeze
- Blade
- Tailwind CSS
- Vite
- Docker
- Docker Compose

## Features

### Authentication

- User registration
- User login
- Login using **email or username**
- Password authentication
- Remember me
- Password reset
- Logout

### User Registration

Users can register with:

- Name
- Username
- Email
- Password
- Password confirmation

### Employee Management

- Employee records
- Employee details
- Employee database management

---

# Getting Started

Follow the steps below to run the project locally after cloning the repository.

## Prerequisites

Make sure the following are installed on your machine:

- Git
- Docker
- Docker Compose
- WSL2 (for Windows users)

Verify the installations:

```bash
git --version
docker --version
docker compose version
```

---

## 1. Clone the Repository

Clone the project:

```bash
git clone <repository-url>
```

Navigate into the project:

```bash
cd laravel-employee-app
```

---

## 2. Configure Environment

Copy the example environment file:

```bash
cp .env.example .env
```

For Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Update the `.env` database configuration to match the Docker database service.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=employee_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

> Make sure the database credentials match the values configured in `docker-compose.yml`.

---

## 3. Start Docker Containers

Start the application and database containers:

```bash
docker compose up -d
```

Check the running containers:

```bash
docker compose ps
```

You should see the application and database containers running.

---

## 4. Install PHP Dependencies

Install Laravel's Composer dependencies:

```bash
docker compose exec app composer install
```

---

## 5. Generate Application Key

Generate the Laravel application key:

```bash
docker compose exec app php artisan key:generate
```

---

## 6. Install Frontend Dependencies

Install Node.js dependencies:

```bash
docker compose exec app npm install
```

---

## 7. Run Database Migrations

Run the Laravel migrations:

```bash
docker compose exec app php artisan migrate
```

If you want to create a completely fresh database and run the seeders:

```bash
docker compose exec app php artisan migrate:fresh --seed
```

> **Warning:** `migrate:fresh` deletes all existing database tables and data.

---

## 8. Build Frontend Assets

Build the frontend assets:

```bash
docker compose exec app npm run build
```

For development, you can use:

```bash
docker compose exec app npm run dev
```

---

## 9. Access the Application

Once the containers are running, open the application in your browser using the URL configured in `docker-compose.yml`.

Example:

```text
http://localhost
```

---

# Quick Setup

For developers who already have Docker configured, the basic setup is:

```bash
git clone <repository-url>

cd laravel-employee-app

cp .env.example .env

docker compose up -d

docker compose exec app composer install

docker compose exec app php artisan key:generate

docker compose exec app npm install

docker compose exec app php artisan migrate:fresh --seed

docker compose exec app npm run build
```

Then open the application in your browser.

---

# Useful Commands

## Docker

### Start containers

```bash
docker compose up -d
```

### Stop containers

```bash
docker compose down
```

### Restart containers

```bash
docker compose restart
```

### View running containers

```bash
docker compose ps
```

### View application logs

```bash
docker compose logs app
```

### View database logs

```bash
docker compose logs db
```

---

## Laravel Artisan

### Run migrations

```bash
docker compose exec app php artisan migrate
```

### Fresh migration

```bash
docker compose exec app php artisan migrate:fresh
```

### Fresh migration with seeders

```bash
docker compose exec app php artisan migrate:fresh --seed
```

### Clear Laravel caches

```bash
docker compose exec app php artisan optimize:clear
```

### Open Laravel Tinker

```bash
docker compose exec app php artisan tinker
```

### List routes

```bash
docker compose exec app php artisan route:list
```

---

## Composer

### Install dependencies

```bash
docker compose exec app composer install
```

### Update dependencies

```bash
docker compose exec app composer update
```

### Add a package

```bash
docker compose exec app composer require vendor/package
```

---

## NPM

### Install frontend dependencies

```bash
docker compose exec app npm install
```

### Run development server

```bash
docker compose exec app npm run dev
```

### Build production assets

```bash
docker compose exec app npm run build
```

---

# Makefile Commands

The project also provides a `Makefile` for commonly used commands.

### Start the application

```bash
make up
```

### Stop the application

```bash
make down
```

### Run migrations

```bash
make migrate
```

### Fresh migration with seed data

```bash
make fresh
```

> Available Makefile commands may vary depending on the current project configuration.

---

# Database Seeding

The project uses Laravel factories and seeders to generate development data.

Run the seeders:

```bash
docker compose exec app php artisan db:seed
```

Or reset the database and seed it:

```bash
docker compose exec app php artisan migrate:fresh --seed
```

Example user:

```php
User::factory()->create([
    'name' => 'Test User',
    'username' => 'testuser',
    'email' => 'test@example.com',
]);
```

---

# Authentication

The application uses **Laravel Breeze** for authentication.

The login system has been customized to support:

```text
Email + Password
```

or:

```text
Username + Password
```

The login field accepts either an email address or username.

Example:

```text
Email or Username: testuser
Password: ********
```

or:

```text
Email or Username: test@example.com
Password: ********
```

---

# Database

The application uses **MySQL** as its database.

The `users` table contains:

```text
id
name
username
email
email_verified_at
password
remember_token
created_at
updated_at
```

The `username` field is unique.

---

# Project Structure

```text
laravel-employee-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Requests/
│   └── Models/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   └── web.php
│
├── docker-compose.yml
├── Makefile
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```

---

# Development Workflow

After the initial setup, the typical development workflow is:

```bash
# Start Docker
docker compose up -d

# Run migrations when needed
docker compose exec app php artisan migrate

# Run Vite
docker compose exec app npm run dev
```

When finished:

```bash
docker compose down
```

---

# Troubleshooting

## Application Key Is Missing

Run:

```bash
docker compose exec app php artisan key:generate
```

---

## Database Connection Error

Check that the database container is running:

```bash
docker compose ps
```

Check the database configuration in `.env`:

```env
DB_HOST=db
DB_PORT=3306
DB_DATABASE=employee_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

## Database Tables Are Missing

Run:

```bash
docker compose exec app php artisan migrate
```

For a fresh development database:

```bash
docker compose exec app php artisan migrate:fresh --seed
```

---

## CSS or JavaScript Is Not Loading

Install frontend dependencies:

```bash
docker compose exec app npm install
```

Then build the assets:

```bash
docker compose exec app npm run build
```

For development:

```bash
docker compose exec app npm run dev
```

---

# Environment and Security

Do **not** commit the `.env` file to the repository.

The repository should contain:

```text
.env.example
```

but should **not** contain:

```text
.env
```

Make sure `.gitignore` contains:

```gitignore
.env
```

Never commit sensitive information such as:

- Database passwords
- API keys
- Application secrets
- Access tokens

---

# License

This project is for **learning and development purposes**.