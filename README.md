# Sugar

Sugar provides a supercharged starting point for Laravel applications. The package is built on top of the official [Laravel Breeze](https://github.com/laravel/breeze), and includes:

-   Vite (instead of Webpack + Mix)
-   Vue 3 (modern SFC setup syntax)
-   TypeScript
-   Tailwind CSS
-   Inertia.js

## Installation

You can install the package via composer:

```bash
composer require based/sugar --dev
```

Then, publish the assets provided by Sugar, and compile them:

```bash
php artisan sugar:install

npm install
npm run dev
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
