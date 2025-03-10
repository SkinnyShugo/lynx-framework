# Lynx Framework

The **Lynx Framework** is a Laravel package that provides powerful API handling and caching utilities. It simplifies interactions with external APIs while leveraging Laravel’s caching system to optimize performance.

## Table of Contents
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [API Client](#api-client-usage)
  - [Cache Manager](#cache-manager-usage)
- [Running Tests](#running-tests)
- [Contributing](#contributing)
- [License](#license)

## Installation

To install the **Lynx Framework** package, run the following command in your Laravel project:

```sh
composer require skinnyshugo/lynx-framework
```

After installation, publish the package configuration file:

```sh
php artisan vendor:publish --tag=config
```

This will create a configuration file at `config/lynx.php`.

## Configuration

The configuration file (`config/lynx.php`) allows you to adjust the default settings for the API client and caching utilities.

### Example default configuration:

```php
<?php

return [
    'api_timeout' => env('LYNX_API_TIMEOUT', 10), // API request timeout in seconds
    'cache_lifetime' => env('LYNX_CACHE_LIFETIME', 60), // Cache duration in minutes
];
```

You can override these settings by adding the corresponding variables to your `.env` file:

```env
LYNX_API_TIMEOUT=15
LYNX_CACHE_LIFETIME=120
```

## Usage

### API Client Usage

The **API Client** provides an easy way to perform HTTP GET requests. It uses GuzzleHTTP under the hood and handles JSON responses automatically.

#### Example usage:

```php
use Skinnyshugo\LynxFramework\Api\ApiClient;

$apiClient = new ApiClient();
$response = $apiClient->get('https://jsonplaceholder.typicode.com/todos/1');

if (isset($response['error'])) {
    // Handle error
    echo 'Error: ' . $response['error'];
} else {
    // Use the API response data
    print_r($response);
}
```

### Cache Manager Usage

The **Cache Manager** utilizes Laravel's cache system to store and retrieve data, helping reduce redundant API calls and improve performance.

#### Example usage:

```php
use Skinnyshugo\LynxFramework\Cache\CacheManager;
use Illuminate\Support\Facades\Cache;

$cacheManager = new CacheManager(Cache::store());

// Cache data with a key "my_cache_key" for 60 minutes
$data = $cacheManager->remember('my_cache_key', 60, function () {
    return 'This is cached data!';
});

echo $data;
```

### Integrating with Laravel

The package provides a Laravel service provider (`Skinnyshugo\LynxFramework\LynxServiceProvider`) that registers the API Client and Cache Manager as singletons. After installing the package and publishing the configuration, Laravel will automatically detect and register the service provider (if package discovery is enabled).

You can also manually add the service provider to your `config/app.php` if needed:

```php
'providers' => [
    // Other service providers...
    Skinnyshugo\LynxFramework\LynxServiceProvider::class,
],
```

Once registered, you can access the package’s services via the Laravel service container:

```php
// Retrieve the API Client instance
$apiClient = app('lynx-api');

// Retrieve the Cache Manager instance
$cacheManager = app('lynx-cache');
```

## Running Tests

To run the tests included in the package, use PHPUnit:

```sh
vendor/bin/phpunit
```

Tests are located in the `tests/` directory and include:
- `tests/ApiClientTest.php`
- `tests/CacheManagerTest.php`

## Contributing

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a feature branch.
3. Submit a pull request.

Please ensure your code adheres to the project standards and includes tests.

## License

The Lynx Framework is open-source software licensed under the [MIT License](LICENSE).

---

Thank you for using **Lynx Framework**! For any issues or questions, please open an issue on [GitHub](https://github.com/skinnyshugo/lynx-framework).

