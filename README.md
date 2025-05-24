# Laravel Blog CRUD

A simple blog application demonstrating basic CRUD (Create, Read, Update, Delete) operations using [Laravel](https://laravel.com/).

## Features
- Manage blog posts with a clean CRUD interface.
- Blade views styled with Tailwind CSS and built using Vite.
- Ships with SQLite configuration for quick local setup.

## Requirements
- PHP 8.2 or higher
- [Composer](https://getcomposer.org/)
- Node.js & npm

## Installation
1. Clone the repository and install PHP dependencies:
   ```bash
   composer install
   ```
2. Install Node packages:
   ```bash
   npm install
   ```
3. Copy the example environment file and generate an application key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Create the SQLite database file (or update `.env` for another database):
   ```bash
   touch database/database.sqlite
   ```
5. Run the database migrations:
   ```bash
   php artisan migrate
   ```

## Running the App
During development you can build frontend assets and run the server with:
```bash
npm run dev &
php artisan serve
```
Then visit `http://localhost:8000` in your browser. A convenient `composer run dev` script is also available which runs the queue, logs and Vite together.

For a production build of assets use:
```bash
npm run build
```

## Testing
Run the test suite with:
```bash
php artisan test
```

## License
Released under the [MIT License](https://opensource.org/licenses/MIT).
