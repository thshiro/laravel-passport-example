
# Laravel Passport Implementation

Basic implementation of Laravel Passport

See [Laravel passport documentation](https://laravel.com/docs/7.x/passport#introduction)

## Steps

### Install Package

```php
composer require laravel/passport
```

### Run Migrations

```php
php artisan migrate
```

### Install Artisan

```php 
php artisan passport:install
```

### Implement Trait in the model

```php
app/Users.php
```

```php
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
```

### Implement Routes in the provider boot

```php
app/Providers/AuthServiceProvider.php
```

```php
public function boot()
{
    $this->registerPolicies();
    Passport::routes();
    //
}
```

### Update Auth Config

```php
config/auth.php
```

```php
'api' => [
    'driver' => 'passport',
]
```

### Routes

See `routes/api/v1/api.php`

### Attempting to Authenticate

```php
Auth::attempt([$request])
```

### Get an Access Token

```php
$request->user()->createToken('token')->accessToken
```

# With Laravel Auth

See: [Laravel Authentication](https://laravel.com/docs/7.x/authentication)

```php
composer require laravel/ui
```

```php
php artisan ui vue --auth
```

```php
php artisan serve
```


