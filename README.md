# HTTP Tortilla - HTTP Message (PSR-7) Wrapper

> This project is an independently maintained fork of [phoneburner/http-tortilla](https://github.com/phoneburner/http-tortilla), originally
> released under the MIT license, by the original project authors. This fork is neither affiliated with nor endorsed by
> PhoneBurner.

This library provides a simple set of traits to allow wrapping (or decoration) of various PSR-7 classes. Wrapping the
classes allows easy addition of convenience methods while maintaining compatibility with code that relies on the
underlying PSR interfaces.

## Requirements

- PHP >= 8.2
- [`psr/http-message`](https://github.com/php-fig/http-message) ^1.1 || ^2.0

This package works with either v1.1 or v2.0 of the PSR-7 interfaces, but does not provide the actual implementations to
be wrapped. Those can be found in other packages, e.g. [`guzzlehttp/psr-7`](https://github.com/guzzle/psr7) or
[Laminas Diactoros](https://github.com/laminas/laminas-diactoros).

## Installation

The preferred method of installation is to use [Composer](https://getcomposer.org/):

```bash
composer require wickedbyte/http-tortilla
```

## Usage

To add behaviour to a PSR-7 object that implements `MessageInterface` or one of its subclasses, `use` the matching
wrapper trait, and call `setMessage($message)` to wrap the target object.

Once `setMessage($message)` is called, all interface methods will be proxied to the original object. Any of those methods
can be redefined, however, most usage will probably be adding _additional_ convenience methods to the object.

Because most `with*()` methods will likely evolve the _wrapped_ object as the method is proxied to that underlying
object. To maintain the wrapping through various calls to `with*()`, `setFactory($callable)` allows a callable that
returns a wrapped object when given the product of the underlying `with*()` message.

If the underlying object needs to be accessed, `getMessage()` may be used.

```php
<?php

declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface;
use WickedByte\Http\Message\ServerRequestWrapper;

class Request implements ServerRequestInterface
{
    use ServerRequestWrapper;

    public function __construct(ServerRequestInterface $request)
    {
        // wrap this object, and proxy all the interface methods to it
        $this->setMessage($request);

        // wrap all proxied `with*` methods in this function
        $this->setFactory(function(ServerRequestInterface $request){
            // now `with*` will return an instance of the current class
            return new self($request);
        });
    }
}
```

## Examples

Perhaps it would be convenient to access query parameters as a collection (and not the interface's `array`):

```php
<?php

declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface;
use WickedByte\Http\Message\ServerRequestWrapper;

class Request implements ServerRequestInterface
{
    use ServerRequestWrapper;

    public function __construct(ServerRequestInterface $request)
    {
        $this->setMessage($request);
        $this->setFactory(fn(ServerRequestInterface $request) => new self($request));
    }

    public function getQueryCollection()
    {
        return new Collection($this->getQueryParams());
    }
}
```

Or perhaps the underlying library doesn't handle parsing JSON requests:

```php
<?php

declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface;
use WickedByte\Http\Message\ServerRequestWrapper;

class Request implements ServerRequestInterface
{
    use ServerRequestWrapper;

    public function __construct(ServerRequestInterface $request)
    {
        $this->setMessage($request);
        $this->setFactory(fn(ServerRequestInterface $request) => new self($request));
    }

    public function getParsedBody()
    {
        if ($parsed = $this->getMessage()->getParsedBody()) {
            return $parsed;
        }

        $decoded = json_decode($this->getBody(), true);

        if (json_last_error() == JSON_ERROR_NONE) {
            return $decoded;
        }

        return $parsed;
    }
}
```

## Contributing

Contributions are welcome, please see [CONTRIBUTING.md](CONTRIBUTING.md) for more information, including reporting bugs
and creating pull requests.

## Coordinated Disclosure

Keeping user information safe and secure is a top priority, and we welcome the contribution of external security
researchers. If you believe you've found a security issue, please read [SECURITY.md](SECURITY.md) for instructions on
submitting a vulnerability report.
