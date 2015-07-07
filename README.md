badawy/embedly
================
[![Latest Stable Version](https://poser.pugx.org/badawy/embedly/v/stable)](https://packagist.org/packages/badawy/embedly)
[![Total Downloads](https://poser.pugx.org/badawy/embedly/downloads)](https://packagist.org/packages/badawy/embedly)
[![Latest Unstable Version](https://poser.pugx.org/badawy/embedly/v/unstable)](https://packagist.org/packages/badawy/embedly)
[![License](https://poser.pugx.org/badawy/embedly/license)](https://packagist.org/packages/badawy/embedly)

Custom PHP Embedly Package for the Laravel 5 framework - developed by [Ahmad Elbadawy](https://github.com/elbadawy).



## Installation

1) Pull this package in through Composer.

```js

    {
        "require": {
            "badawy/embedly": "dev-master"
        }
    }

```

2) Add the service provider to your `config/app.php` file:

```php

    providers   => array(

        //...
        'Badawy\Embedly\EmbedlyServiceProvider',

    ),

```

3) Add the facade to your `config/app.php` file:

```php

    facades     => array(

        //...
        'Embedly'          => 'Badawy\Embedly\Facades\Embedly',

    ),

```

```

4) Copy the package config to your local config with the publish command:

```php

    php artisan vendor:publish

```



## Usage



Comming Soon!




## License

This template is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)




## Contact

Ahmad Elbadawy (developer)

- Email: ahmad.elbadawy@outlook.com