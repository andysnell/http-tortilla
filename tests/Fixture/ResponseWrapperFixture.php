<?php

declare(strict_types=1);

namespace WickedByte\Tests\Http\Message\Fixture;

use Psr\Http\Message\ResponseInterface;
use WickedByte\Http\Message\ResponseWrapper;

final class ResponseWrapperFixture implements ResponseInterface
{
    use ResponseWrapper;

    protected function wrap(ResponseInterface $response): static
    {
        return new self($response);
    }

    public function __construct(ResponseInterface|null $wrapped = null, callable|null $factory = null)
    {
        if ($wrapped instanceof ResponseInterface) {
            $this->setWrapped($wrapped);
        }

        if ($factory !== null) {
            $this->setWrappedFactory($factory);
        }
    }
}
