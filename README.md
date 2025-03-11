# Laravel Authentication System


## About This Project

This project is a Laravel 12 application demonstrating a robust authentication system with a MySQL database. It includes:

- User registration, login, and logout functionality
- A protected profile page accessible only to authenticated users
- Laravel’s Blade templating, middleware, and migrations

## Features

- **Dynamic User Name Display**: Shows the authenticated user’s name or "Unavailable" for guests
- **Profile Page**: Restricted to logged-in users using custom middleware

## Project Setup

### Prerequisites

- **PHP 8.2+**: Laravel 12 requires PHP 8.2 or later
- **Composer**: Manages PHP dependencies
- **Node.js & npm**: Required for asset compilation with Vite

### Installation

#### 1. Clone the Repository

```bash
git clone laravel-auth
cd laravel-auth
```

#### 2. Install Dependencies

```bash
composer install
npm install
npm run build  # Compiles assets
```


Edit the `.env` file to configure database credentials (see "Database Setup").

### Database Setup

#### MySQL Configuration (via Docker)

Edit `.env` to match the Docker Compose settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_auth_system
DB_USERNAME=root
DB_PASSWORD=root
```

## Authentication System

### Installing `laravel/ui`

```bash
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run build
```

- `--auth` generates authentication views and routes.
- `npm run build` recompiles assets.

### Generated Files

**Views:**
- `resources/views/auth/login.blade.php`
- `resources/views/auth/register.blade.php`
- `resources/views/layouts/app.blade.php`

**Controllers:**
- `app/Http/Controllers/Auth/`
- `app/Http/Controllers/ProfileController.php`

**Routes:** (Added to `routes/web.php`)

```php

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])
    ->middleware(EnsureUserIsAuthenticated::class)
    ->name('profile');
```

## Profile Component

### Implementation

#### Controller: `app/Http/Controllers/ProfileController.php`

```php
<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{


    public function index()
    {
        return view('profile');
    }
}
```

#### View: `resources/views/profile.blade.php`

```blade
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Profile Page</h1>
        <p>Welcome, {{ Auth::user()->name }}!</p>
    </div>
@endsection
```

### Dynamic User Name Display

In `home.blade.php`:

```blade
<div>
    <h1 class="client-name mt-10">
        {{ Auth::check() ? Auth::user()->name : 'Unavailable' }}
    </h1>
    <p class="client-title">Social Work</p>
    <a href="{{ route('profile') }}">
        <p class="client-title">Profile Page</p>
    </a>
</div>
```

## Running the Application Locally (Without Docker)

### 1. Start MySQL Locally
Ensure MySQL is running and matches `.env` credentials.

### 2. Run Migrations
```bash
php artisan migrate
```

### 3. Serve the Application
```bash
php artisan serve
```
Access the application at `http://localhost:8000`.

### 4. Compile Assets
```bash
npm run dev  
npm run build
```

## Project Structure

```
your-laravel-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/           # Generated by laravel/ui
│   │   │   └── ProfileController.php
├── database/
│   └── migrations/            # Auto-generated for users table
├── resources/
│   ├── views/
│   │   ├── auth/              # Login, register views
│   │   ├── layouts/           # Base layout (app.blade.php)
│   │   ├── home.blade.php     # Main page with dynamic name
│   │   └── profile.blade.php  # Protected profile page
├── routes/
│   └── web.php                # Routes
```
