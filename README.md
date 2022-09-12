# Laravel Adapty

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mberatsanli/laravel-adapty.svg?style=flat-square)](https://packagist.org/packages/mberatsanli/laravel-adapty)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/mberatsanli/laravel-adapty/run-tests?label=tests)](https://github.com/mberatsanli/laravel-adapty/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/mberatsanli/laravel-adapty/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/mberatsanli/laravel-adapty/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mberatsanli/laravel-adapty.svg?style=flat-square)](https://packagist.org/packages/mberatsanli/laravel-adapty)

A Laravel package for the Adapty SDK. 
**Please feel free to contribute...**

## Installation

You can install the package via composer:

```bash
composer require mberatsanli/laravel-adapty
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-adapty-config"
```

This is the contents of the published config file:

```php
return [
    'base_url' => env('ADAPTY_BASE_URL', 'https://api.adapty.io/api/v1/sdk'),

    'secret_token' => env('ADAPTY_SECRET_TOKEN'), // Your adapty secret token.

    'webhook' => [
        'path' => env('ADAPTY_WEBHOOK_PATH', '/adapty/webhook'), // webhook endpoint's path
        'middleware' => [] // If you want to use middleware on the webhook endpoint, you can adjust that configuration
    ],
];
```
## Usage

```php
// Create a user
$createResponse = \MBS\LaravelAdapty\LaravelAdapty::createUser('<USER ID>');

// Get information about the user
$informationResponse = \MBS\LaravelAdapty\LaravelAdapty::userInformation('<USER ID -- OR -- Adapty Profile ID>');

// Set attributes to the user
$setAttributesResponse = \MBS\LaravelAdapty\LaravelAdapty::setUserAttributes('<USER ID -- OR -- Adapty Profile ID>', [
    // see https://docs.adapty.io/docs/server-side-api-specs#set-the-users-attribute
]);

// see https://docs.adapty.io/docs/getting-started-with-server-side-api#case-2-grant-a-subscription
$grantRequest = \MBS\LaravelAdapty\Requests\GrantSubscriptionRequest::make(7, ....);
$grantResponse = \MBS\LaravelAdapty\LaravelAdapty::grantSubscription('<USER ID -- OR -- Adapty Profile ID>', $grantRequest);

// See https://docs.adapty.io/docs/server-side-api-specs#revoke-subscription-from-a-user
$revokeSubscriptionResponse = \MBS\LaravelAdapty\LaravelAdapty::revokeSubscription(profileId: '<USER ID -- OR -- Adapty Profile ID>', accessLevel: 'premium', isRefund: <bool>)

```

## Testing

**No tests available for now**

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please feel free to contributing...

## Credits

- [Melih Berat ŞANLI](https://github.com/mberatsanli)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
