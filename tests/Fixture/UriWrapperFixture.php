<?php

declare(strict_types=1);

namespace WickedByte\Tests\Http\Message\Fixture;

use Psr\Http\Message\UriInterface;
use WickedByte\Http\Message\UriWrapper;

final class UriWrapperFixture implements UriInterface
{
    use UriWrapper;

    protected function wrap(UriInterface $uri): static
    {
        return new self($uri);
    }

    public function __construct(UriInterface|null $wrapped = null, callable|null $factory = null)
    {
        if ($wrapped instanceof UriInterface) {
            $this->setWrapped($wrapped);
        }

        if ($factory !== null) {
            $this->setWrappedFactory($factory);
        }
    }
}
