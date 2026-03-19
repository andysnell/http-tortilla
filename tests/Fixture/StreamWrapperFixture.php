<?php

declare(strict_types=1);

namespace WickedByte\Tests\Http\Message\Fixture;

use Psr\Http\Message\StreamInterface;
use WickedByte\Http\Message\StreamWrapper;

class StreamWrapperFixture implements StreamInterface
{
    use StreamWrapper;

    public function __construct(StreamInterface|null $wrapped = null, callable|null $factory = null)
    {
        if ($wrapped instanceof StreamInterface) {
            $this->setWrapped($wrapped);
        }

        if ($factory !== null) {
            $this->setWrappedFactory($factory);
        }
    }
}
