# Laravel-Advanced-Blog-System
# Laravel Blog

Laravel Blog is a full-featured blogging platform built with Laravel. It includes role-based authentication, API authentication, social login (Google and Facebook), advanced caching, routing, middleware usage, user activity logging, and extensive test coverage.

## Features

- **Role-Based Authentication:** Using Laravel Breeze for easy and secure role-based login.
- **Soft Delete:** Using Laravel soft delete in this project.
- **API Authentication:** Implemented with Laravel Sanctum for secure API access.
- **Social Login:** Supports Google and Facebook login via Laravel Socialite.
- **Caching:** Enhanced performance with caching for faster load times.
- **Advanced Routing:** Sophisticated routing for better request handling.
- **Multiple Middleware:** Uses multiple middleware for robust request processing.
- **User Activity Logging:** Logs user activities for monitoring and analytics.
- **Test Cases:** Comprehensive test cases for various functions and components.

## Installation

### Prerequisites

- PHP >= 7.3
- Composer
- Node.js & npm
- MySQL or any other supported database

### Steps

1. **Clone the repository:**
   ```sh
   git clone https://github.com/your-username/laravel-blog.git
   cd laravel-blog

   composer install
    npm install
   
   Copy the .env.example file to .env:
   cp .env.example .env


Set up the database:
- Update the .env file with your database credentials.
- Run the following commands to migrate and seed the database
    ```sh
         php artisan migrate
         php artisan db:seed

Generate application key:

        php artisan key:generate

Configure Socialite:
Add your Google and Facebook credentials to the .env file:
    
    GOOGLE_CLIENT_ID=your-google-client-id
    GOOGLE_CLIENT_SECRET=your-google-client-secret
    GOOGLE_REDIRECT=http://localhost:8000/auth/google/callback
    
    FACEBOOK_CLIENT_ID=your-facebook-client-id
    FACEBOOK_CLIENT_SECRET=your-facebook-client-secret
    FACEBOOK_REDIRECT=http://localhost:8000/auth/facebook/callback

Run the development server:

    php artisan serve
    npm run dev

Usage:

 Role-Based Login:
  Laravel Breeze is used for handling role-based authentication. Ensure you have set up your roles correctly in the database.
  
 API Authentication:
  Laravel Sanctum is used for API authentication. Protect your routes using Sanctum middleware.
  
Social Login:
  Use the following routes for social login:
    Google: /auth/google
    Facebook: /auth/facebook
    
Caching:
  The application uses caching for improved performance. Cache configurations can be found in config/cache.php.
  
Advanced Routing:
  The application employs advanced routing techniques for efficient request handling. Check routes/web.php and routes/api.php for more details.
  
Middleware:
  Multiple middleware are used for various purposes like authentication, logging, etc. Custom middleware can be found in app/Http/Middleware.
  
User Activity Logging:
  User activities are logged for monitoring purposes. The logging logic can be found in app/Http/Middleware/LogUserActivity.php.
  
Testing:
      
    php artisan test

Contributing:
    Contributions are welcome! Please submit a pull request or open an issue to discuss what you would like to change.

License:
    This project is open-sourced software licensed under the MIT license.