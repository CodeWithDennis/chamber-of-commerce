# Laravel Chamber Of Commerce API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codewithdennis/chamber-of-commerce.svg?style=flat-square)](https://packagist.org/packages/codewithdennis/chamber-of-commerce)
[![Total Downloads](https://img.shields.io/packagist/dt/codewithdennis/chamber-of-commerce.svg?style=flat-square)](https://packagist.org/packages/codewithdennis/chamber-of-commerce)

This Kamer van Koophandel (Chamber of Commerce) API wrapper enables seamless interaction with the Kamer van Koophandel (Chamber of Commerce) API, enabling you to access information about businesses and organizations registered in the Netherlands. For comprehensive details, please visit the official Kamer van Koophandel website.

![Chamber Of Commerce (2)](https://github.com/CodeWithDennis/chamber-of-commerce/assets/23448484/2f892e9b-1927-4355-b1a1-043c12f69caa)

## Installation

You can install the package via composer:

```bash
composer require codewithdennis/chamber-of-commerce
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="chamber-of-commerce-config"
```

This is the contents of the published config file:

```php
return [
    'key' => env('COC_API_KEY'),
];
```

## How to Use
Add your API key to the `.env` file

```dotenv
COC_API_KEY=<YOUR_API_KEY>
```

Create an instance of the ChamberOfCommerce class to start making API requests:

```php
use CodeWithDennis\ChamberOfCommerce\ChamberOfCommerce;

$chamberOfCommerce = new ChamberOfCommerce();
```

### Use the search function

Search by KvK number
```php
$chamberOfCommerce->number('12345678');
```

Search by business name number

```php
$chamberOfCommerce->name('IKEA');
```

Search by RSIN number
```php
$chamberOfCommerce->rsin('123456789');
```

Include inactive companies in the search results.
```php
$chamberOfCommerce->withInactiveCompanies(true);
```

Search by branche number
```php
$chamberOfCommerce->branchNumber('B1234');
```

Search by street name

```php
$chamberOfCommerce->streetName('Hullenbergweg');
```

Search by postal code (In combination with house number)
```php
$chamberOfCommerce->postalCode('1234 AB');
```

Search by house number (requires postal code)
```php
$chamberOfCommerce->houseNumber('2');
```
Search by house number addition

```php
$chamberOfCommerce->houseNumberAddition('A');
```

Search by location (city, place)

```PHP
$chamberOfCommerce->location('Amsterdam');
```

Search by business type
```php
// Options: hoofdvestiging (main office), nevenvestiging (branch office), rechtspersoon (legal entity)
$chamberOfCommerce->type('hoofdvestiging');
```

Set the page number for pagination (you can use this to iterate through pages)
```php
$chamberOfCommerce->page(1);
```

Set the number of results per page.
```php
$chamberOfCommerce->pagination(10);
```

After chaining your methods, you can initiate the API request by invoking the "search" function like so:

```php
$response = $chamberOfCommerce
    ->name('IKEA')
    ->location('Amsterdam')
    ->pagination(5)
    ->search();
```


### Basic profiles
To fetch basic profiles for a particular KvK (Chamber of Commerce) number, you can use the following code:

```php
$response = $chamberOfCommerce
    ->withGeo() // Default: false
    ->number(33143768)
    ->profiles();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [CodeWithDennis](https://github.com/CodeWithDennis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
