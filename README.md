<p align="center"><img src="https://github.com/aminetiyal/tell/blob/master/public/logo.svg?raw=true" width="100"></p>

<p align="center">
<a href="https://packagist.org/packages/aminetiyal/tell"><img src="https://img.shields.io/packagist/v/aminetiyal/tell.svg" alt="Latest Version on Packagist"></a>
<a href="https://travis-ci.org/aminetiyal/tell"><img src="https://travis-ci.org/aminetiyal/tell.svg" alt="Build Status"></a>
<a href="https://scrutinizer-ci.com/g/aminetiyal/tell"><img src="https://img.shields.io/scrutinizer/g/aminetiyal/tell.svg" alt="Quality Score"></a>
<a href="https://packagist.org/packages/aminetiyal/tell"><img src="https://img.shields.io/packagist/dt/aminetiyal/tell.svg" alt="Total Downloads"></a>
</p>

# About TELL

TELL is a lightweight and full SPA Laravel package built with [Vue](https://github.com/vuejs/vue), [TailwindCSS](https://github.com/tailwindcss/tailwindcss) and [Sanctum](https://github.com/laravel/sanctum) to provide a full BLOG system that can be mounted on your application.

You can publish your posts using [CKEDITOR 5](https://github.com/ckeditor/ckeditor5) with tags supported.

## Installation

You can install the package via composer:

```bash
composer require aminetiyal/tell
```
Then you may setup the package using artisan:

```bash
php artisan tell:install
```
To keep the assets up-to-date and avoid issues in future updates, we highly recommend adding the command to the post-autoload-dump scripts in your composer.json file:

```bash
{
    "scripts": {
        "post-autoload-dump": [
            "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
            "@php artisan package:discover --ansi",
            "@php artisan vendor:publish --force --tag=tell:assets --ansi"
        ]
    }
}
```

## Note

Please note that this package use [laravel/sanctum](https://laravel.com/docs/sanctum#how-it-works) to authenticate via cookie, in order to avoid authentication problem please follow this [instructions](https://laravel.com/docs/sanctum#installation).

## Usage

Just navigate to /blog/login or to your costum /[prefix](https://github.com/aminetiyal/tell/blob/17b84ff27b5176ca17bca8053aa77f327a27b12a/config/config.php#L17)/login if changed, and authenticate using your default credentials.

## Credits

- [Amine TIYAL](https://github.com/aminetiyal)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
