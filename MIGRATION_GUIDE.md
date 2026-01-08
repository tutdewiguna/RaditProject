# CodeIgniter to Laravel Migration Guide

This document outlines the conversion from CodeIgniter 4 to Laravel 10 that has been completed.

## Completed Conversions

### 1. Framework Structure
- ✅ Updated `composer.json` to use Laravel 10
- ✅ Created Laravel bootstrap structure (`bootstrap/app.php`)
- ✅ Updated `public/index.php` for Laravel

### 2. Routes
- ✅ Converted `app/Config/Routes.php` to `routes/web.php`
- ✅ All routes converted to Laravel route format
- ✅ Route groups and middleware applied correctly

### 3. Models
- ✅ Converted all CodeIgniter Models to Laravel Eloquent Models:
  - `UserModel` → `User` (extends `Authenticatable`)
  - `ProductModel` → `Product`
  - `CategoriesModel` → `Category`
  - `NewsModel` → `News`
  - `OrdersModel` → `Order`
  - `RoleModel` → `Role`

### 4. Controllers
- ✅ Converted all controllers to Laravel format:
  - Frontend: `HomeController`, `AuthController`
  - Backend: `HomeController`, `AuthController`, `ProductsController`, `CategoriesController`, `NewsController`, `OrdersController`

### 5. Middleware
- ✅ Converted `AdminAuthFilter` to `AdminAuth` middleware
- ✅ Registered in `bootstrap/app.php`

## Next Steps Required

### 1. Install Laravel Dependencies
```bash
composer install
```

### 2. Environment Setup
- Copy `.env.example` to `.env` (if it doesn't exist)
- Generate application key: `php artisan key:generate`
- Update database configuration in `.env`:
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=outfit_db
  DB_USERNAME=root
  DB_PASSWORD=
  ```

### 3. Directory Structure
You may need to create additional Laravel directories:
- `storage/app/public`
- `storage/framework/cache`
- `storage/framework/sessions`
- `storage/framework/views`
- `storage/logs`

### 4. Views
Views should work as-is, but check for any CodeIgniter-specific helpers:
- CodeIgniter's `base_url()` → Laravel's `url()` or `asset()`
- CodeIgniter's `site_url()` → Laravel's `route()`
- CodeIgniter's `form_open()` → Laravel's `@csrf` and standard HTML forms

### 5. File Uploads
The file upload logic in `ProductsController` has been updated to use Laravel's file handling. Ensure the `public/uploads/products` directory exists and is writable.

### 6. Session Configuration
Laravel uses different session drivers. Update `.env`:
```
SESSION_DRIVER=database
```

If using database sessions, create the sessions table:
```bash
php artisan session:table
php artisan migrate
```

### 7. Database Migrations
Create Laravel migrations for your tables if they don't exist yet. The database schema should remain the same.

### 8. Testing
- Test all routes
- Test authentication flows
- Test file uploads
- Test admin middleware protection

## Key Differences

### Request Handling
- CodeIgniter: `$this->request->getPost('field')`
- Laravel: `$request->field` or `$request->input('field')`

### Validation
- CodeIgniter: `\Config\Services::validation()` with rules array
- Laravel: `Validator::make()` or `$request->validate()`

### Database Queries
- CodeIgniter: `$model->findAll()`, `$model->find($id)`, `$model->save()`, `$model->update($id, $data)`
- Laravel: `Model::all()`, `Model::find($id)`, `Model::create()`, `Model::where('id', $id)->update($data)`

### Redirects
- CodeIgniter: `redirect()->to('url')`
- Laravel: `redirect()->route('route.name')` or `redirect('url')`

### Views
- CodeIgniter: `view('path', $data)`
- Laravel: `view('path', $data)` or `view('path')->with('key', 'value')`

### Sessions
- CodeIgniter: `session()->set()`, `session()->get()`
- Laravel: `session(['key' => 'value'])`, `session()->get('key')` or `$request->session()->put('key', 'value')`

## Notes

- The old CodeIgniter files are still in the project. You may want to remove them after confirming everything works:
  - `app/Config/` (CodeIgniter config files)
  - `app/Controllers/BaseController.php` (old CodeIgniter version)
  - `app/Models/*Model.php` (old CodeIgniter models)
  - `app/Filters/` (CodeIgniter filters)
  - `app/Modules/` (old controllers)

- Views are kept in the same location but may need minor updates for Laravel helpers.

- Make sure to run `php artisan optimize:clear` if you encounter caching issues.

