# Laravel Employee Management System

A simple **Employee Management System** built with **Laravel**, featuring user authentication and employee management functionality.

## Tech Stack

- **Laravel**
- **PHP**
- **MySQL**
- **Laravel Breeze** – Authentication
- **Blade** – Frontend templating
- **Tailwind CSS**
- **Docker / Docker Compose**

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

The application is designed to manage employee information, including:

- Employee records
- Employee details
- Employee database management

## Project Structure

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
│   └── views/
│       └── auth/
│
├── routes/
│   └── web.php
│
├── docker-compose.yml
├── Makefile
├── composer.json
└── README.md