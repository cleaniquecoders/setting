# Laravel Setting Helper

## Installation

```
composer require cleaniquecoders/setting
```

## Register Service Provider

Open up `config/app.php` and register `CleaniqueCoders\Providers\SettingServiceProvider::class,` in `providers` key.

## Available Commands

### Helper

There's a helper available in using this package

#### Get Setting Based on Key Name

```php
setting('key-name');
```

#### Set Setting Based on Key Name

```php
setting('key-name','items to save');
```

### Flush Setting

Following command will flush cached settings.

```
php artisan setting:flush
```

Pass in `--truncate=1` to flush settings in database as well.

### Clear All Caches and Serve the Application

```
php artisan clear:serve
```

**In case you need to run at different port:**

```
php artisan clear:serve --port=9000
```

### Create a New Route

```
php artisan make:route RouteName
```

**You can create route for API too**

```
php artisan make:route RouteName --api
```

### Create a new Model, Migration, Resourceful Controller, Route and Request

```
php artisan make:common ModelA ModelB ModelC
```