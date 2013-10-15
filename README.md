Test
====

[![Build Status][]](https://travis-ci.org/phine/lib-test)
[![Coverage Status][]](https://coveralls.io/r/phine/lib-test)
[![Latest Stable Version][]](https://packagist.org/packages/phine/test)
[![Total Downloads][]](https://packagist.org/packages/phine/test)

A PHP library for improving unit testing.

Usage
-----

```php
use Phine\Test\Method;
use Phine\Test\Property;

class Example
{
    private static $isStatic = 'original';

    private $nonStatic = 'original';

    protected static function isStatic($arg)
    {
        return "Static: $arg";
    }

    protected function nonStatic($arg)
    {
        return "Non static: $arg";
    }
}

$example = new Example();

// retrieve hidden values
echo Property::get('Example', 'isStatic'); // "original"
echo Property::get($example, 'nonStatic'); // "original"

// change hidden values
Property::set('Example', 'isStatic', 'changed');
Property::set($example, 'nonStatic', 'changed');

echo Property::get('Example', 'isStatic'); // "changed"
echo Property::get($example, 'nonStatic'); // "changed"

// invoke hidden methods
echo Method::invoke('Example', 'isStatic', 123); // "Static: 123"
echo Method::invoke($example, 'nonStatic', 456); // "Non static: 456"

echo Method::invokeArgs('Example', 'isStatic', array(123)); // "Static: 123"
echo Method::invokeArgs($example, 'nonStatic', array(456)); // "Static: 456"
```

Requirement
-----------

- PHP >= 5.3.3
- [Phine Exception][] >= 1.0

Installation
------------

Via [Composer][]:

    $ composer require "phine/test=~1.0"

Documentation
-------------

You can find the documentation in the [`docs/`](docs/) directory.

License
-------

This library is available under the [MIT license](LICENSE).

[Build Status]: https://travis-ci.org/phine/lib-test.png?branch=master
[Coverage Status]: https://coveralls.io/repos/phine/lib-test/badge.png
[Latest Stable Version]: https://poser.pugx.org/phine/test/v/stable.png
[Total Downloads]: https://poser.pugx.org/phine/test/downloads.png
[Phine Exception]: https://github.com/phine/lib-exception
[Composer]: http://getcomposer.org/
