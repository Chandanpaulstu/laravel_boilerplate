# Laravel API Boilerplate with JWT Authentication

## Prerequisites
1. PHP 8.1+
2. Composer
3. MySQL 5.7+
4. Node.js 16+ (optional for frontend)

## Installation
```bash
git clone https://github.com/Chandanpaulstu/laravel_boilerplate.git
cd laravel_boilerplate
composer install
cp .env.example .env
php artisan key:generate
php artisan jwt:secret

#Database Setup
Configure .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_boilerplate
DB_USERNAME=root
DB_PASSWORD=

#Publish Spatie permissions
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

#Run migrations:

php artisan migrate --seed
#Running the Server

php artisan serve
#API Endpoints Authentication
Endpoint	       Method   Description
/api/auth/register	POST	Register new user
/api/auth/login	    POST	Login & get JWT token
/api/auth/logout	POST	Invalidate token
/api/auth/refresh	POST	Refresh JWT token
/api/auth/me	    GET	    Get current user data

#Password Management

Endpoint	                Method	Description
/api/auth/change-password	POST	Change password
/api/auth/forgot-password	POST	Request password reset
/api/auth/reset-password	POST	Complete password reset

#User Management (Admin)

Endpoint	    Method	  Description
/api/users	    GET       List all users
/api/users	    POST	  Create user
/api/users/{id}	GET	      Get user details
/api/users/{id}	PUT	      Update user
/api/users/{id}	DELETE	  Delete user

#Sample Requests Registration

curl -X POST http://localhost:8000/api/auth/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password",
    "password_confirmation": "password"
  }'

#Login

curl -X POST http://localhost:8000/api/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "john@example.com",
    "password": "password"
  }'
  
#Features
✅ JWT Authentication

🔐 Role-Based Access Control

📦 Modular Architecture

✉️ Email Notifications

📄 API Documentation Ready

🛠️ Easy to Extend

#Roadmap
Docker Support

Swagger Documentation

Two-Factor Authentication

Social Login Integration

Audit Logging System
