badawy/embedly
================
[![Latest Stable Version](https://poser.pugx.org/badawy/embedly/v/stable)](https://packagist.org/packages/badawy/embedly) [![Total Downloads](https://poser.pugx.org/badawy/embedly/downloads)](https://packagist.org/packages/badawy/embedly) [![Latest Unstable Version](https://poser.pugx.org/badawy/embedly/v/unstable)](https://packagist.org/packages/badawy/embedly) [![License](https://poser.pugx.org/badawy/embedly/license)](https://packagist.org/packages/badawy/embedly)

Custom Embedly Package for the Laravel 5.*



## Installation

1) Pull this package in through Composer.

```js

    {
        "require": {
            "badawy/embedly": "1.*"
        }
    }

```

2) Add the service provider to the providers array in your `config/app.php` file:

```php
        Badawy\Embedly\EmbedlyServiceProvider
```

3) Add the facade to your `config/app.php` file:

```php
        'Embedly' => Badawy\Embedly\Facades\Embedly
```

4) Copy the package config to your local config with the publish command:

```php
        php artisan vendor:publish
```

5) Add your api key in `config/embedly.php` file:

```php
        'key' => 'xxxxxxxxxxxxxxxxxx'
```


## Usage

You can extract or embed single URL or multiple URLs by pass them into an Array instead of String,

You can also pass an Array of your query arguments as second argument in both Extract and Embed (see examples)

[See Embedly documentation for more information about results, errors and query arguments] (http://embed.ly/docs)



## Examples


1) Embedly Extract


```php
     $q = Embedly::extract('http://techcrunch.com/2013/03/26/embedly-now-goes-beyond-embedding-with-new-products-extract-display-for-making-sense-of-links-resizing-images/'
           'maxwidth' => '500'
       ]);
```

```php
     $q = Embedly::extract([
            'http://techcrunch.com/2013/03/26/embedly-now-goes-beyond-embedding-with-new-products-extract-display-for-making-sense-of-links-resizing-images/',
            'http://deadspin.com/5690535/the-bottom-100-the-worst-players-in-nfl-history-part-1',
            'http://blog.embed.ly/31814817'],[
                'maxwidth' => '500'
       ]);
```


2) Embedly Embed


```php
     $q = Embedly::oembed('http://vimeo.com/18150336',[
           'maxwidth' => '500'
       ]);
```

```php
     $q = Embedly::oembed([
            'https://www.youtube.com/watch?v=jofNR_WkoCE',
            'http://soundcloud.com/whichlight/how-to-pronounce-my-name',
            'http://vimeo.com/18150336'],[
                'maxwidth' => '500'
       ]);
```

Then you can access results :

```php
    if($q->error){
       echo $q->error_message; //Error
    } else {
       echo $q->title; //Get result
    }
```

## ToDo

- Add 'Display' APIs


## License

This template is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)




## Contact

Ahmad Elbadawy

- Email: ahmad.elbadawy@outlook.com
