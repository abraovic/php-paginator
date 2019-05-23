# abraovic/php-paginator

## Installation

The preferred method of installation is via [Packagist][] and [Composer][]. Run the following command to install the package and add it as a requirement to your project's `composer.json`:

```bash
composer require abraovic/php-paginator
```

## How to use

Add new twig template path to `app/config/config.yml`
```php
# Twig Configuration
twig:
    ...
    paths:
        '%kernel.root_dir%/../vendor/abraovic/php-paginator/src/template': 'abraovic_paginate'
```

In your controller:
```php
use abraovic\phpPaginator\Paginate;

class ... {
    function ... {
        return $this->render(
                    'some.html.twig',
                    [
                        ...,
                        'pagination' => Paginate::data(
                            $page, // current page
                            $limit, // max limit per page
                            $total, // total number of items
                            $this->get('router')->generate('_route_name', array(), true) // route link - replace _route_name with proper name
                        )
                    ]
                );
    }
}
```

In your twig:
```php
{{ include('@abraovic_paginate/_paginate.html.twig') }}
```

If there is a [translation bundle] installed you can translate First and Last labels by adding the keys in your app's messages.yaml like this:
```php
First: [first in some other language]
Last: [last in some other language]
```

## Contributing

Contributions are welcome! Please read [CONTRIBUTING][] for details.

## Copyright and license

The abraovic/php-paginator library is copyright © [Ante Braovic](http://antebraovic.me) and licensed for use under the MIT License.

[packagist]: https://packagist.org/packages/abraovic/php-paginator
[composer]: http://getcomposer.org/
[contributing]: https://github.com/abraovic/php-paginator/blob/master/CONTRIBUTORS.md
[translation bundle]: https://symfony.com/doc/current/translation.html