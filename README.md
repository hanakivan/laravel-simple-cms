## Laravel Simple CMS package
Adds support for simple content management system into laravel.


## Functionality
- out of the box cms functionality for content pages
- configurable url prefix


## How to use
1. install the package
```
composer require hanakivan/laravel-simple-cms
```
2. add a service provider to the config file to the list of service providers
```
\hanakivan\LaravelSimpleCms\LaravelSimpleCMSServiceProvider::class,
```
3. run `php artisan serve` and open `http://127.0.0.1:8000` in your browser
4. That's it


### Usage
- to see the blog access `http://127.0.0.1:8000/blog`
- to sign in use `http://127.0.0.1:8000/hanakivan/cms/login`
- use `.env` to configure the options from the package's `config.php` file


#### Seeders for dummy content
`php artisan db:seed --class="hanakivan\LaravelSimpleCms\database\seeders\Tables"`




## Requires
- Laravel >= 8.0
- php >= 8.0

Will probably work with older versions, but untested.

## Licensing
👉 [See license](LICENSE.md)


## Credits
- This package has been made thanks to the following tutorial: https://devdojo.com/devdojo/how-to-create-a-laravel-package
