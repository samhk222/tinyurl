# Package to shorten url with tinyurl (being autenticated or not)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/samhk222/tinyurl.svg?style=flat-square)](https://packagist.org/packages/samhk222/tinyurl)
[![Total Downloads](https://img.shields.io/packagist/dt/samhk222/tinyurl.svg?style=flat-square)](https://packagist.org/packages/samhk222/tinyurl)

Shorten a url, beeing autenticated or not in tinyurl

## Installation

You can install the package via composer:

```bash
composer require samhk222/tinyurl
```

## Usage

Shortening url without beeing autenticated

```php
$shortened = new Samhk222\TinyUrl\TinyUrl();
echo $shortened->shorten('very long url');
```

Shortening url beeing autenticated (you can get your token [here](https://tinyurl.com/app/settings/api)). Remember,
never
save your token in a repo or in the code, save it to a `.env` [file](https://github.com/vlucas/phpdotenv) or something
similar to that

```php
$shortened = Samhk222\TinyUrl\TinyUrl::token("your token here");
echo $shortened->shorten('very long url');
```

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Credits

- [Samuel Ferreira](https://github.com/samhk222)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
