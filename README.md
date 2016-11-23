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
