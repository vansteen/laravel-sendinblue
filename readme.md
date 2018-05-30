# Laravel Sendinblue

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

The package simply provides a Laravel 5 service provider, facade and config file for the SendinBlue's API v3 official PHP library. https://github.com/sendinblue/APIv3-php-library

## Installation

You can install this package via Composer using:

``` bash
$ composer require vansteen/laravel-sendinblue
```

For Laravel <5.5, you must also install the service provider and the facade to your `config/app.php`:

```php
// config/app.php
'providers' => [
    ...
    Vansteen\Sendinblue\SendinblueServiceProvider::class,
    ...
];
```

```php
// config/app.php
'aliases' => [
    ...
    'Sendinblue' => Vansteen\Sendinblue\Facades\Sendinblue::class,
];
```


## Configuration

You need to publish the config file to `app/config/sendinblue.php`. Run:

```bash
php artisan vendor:publish --provider="Vansteen\Sendinblue\SendinblueServiceProvider"
```

Now you need to set your configuration using **environment variables**.
Go the the Sendinblue API settings and add the v3 API key to your `.env` file.

```bash
SENDINBLUE_APIKEY=xkeysib-XXXXXXXXXXXXXXXXXXX
```

## Usage


```php
// routes.php
...
use Vansteen\Sendinblue\Facades\Sendinblue;

Route::get('/test', function () {

    $config = Sendinblue::getConfiguration();

    $apiInstance = new \SendinBlue\Client\Api\ListsApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );

    try {
        $result = $apiInstance->getLists();
        dd($result);
    } catch (Exception $e) {
        echo 'Exception when calling AccountApi->getAccount: ', $e->getMessage(), PHP_EOL;
    }

});
```

To get a idea of the of the API endpoints, visit the API [readme file](https://github.com/sendinblue/APIv3-php-library).

Be sure to visit the SendinBlue official [documentation website](https://sendinblue.readme.io/docs) for additional information about our API.


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/vansteen/sendinblue.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/vansteen/sendinblue.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/vansteen/sendinblue/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/vansteen/sendinblue
[link-downloads]: https://packagist.org/packages/vansteen/sendinblue
[link-travis]: https://travis-ci.org/vansteen/sendinblue
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/vansteen
[link-contributors]: ../../contributors]
