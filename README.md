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
3. That's it


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
