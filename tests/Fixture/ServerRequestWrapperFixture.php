<?php

declare(strict_types=1);

namespace WickedByte\Tests\Http\Message\Fixture;

use Psr\Http\Message\ServerRequestInterface;
use WickedByte\Http\Message\ServerRequestWrapper;

final class ServerRequestWrapperFixture implements ServerRequestInterface
{
    use ServerRequestWrapper;

    protected function wrap(ServerRequestInterface $server_request): static
    {
        return new self($server_request);
    }

    public function __construct(ServerRequestInterface|null $wrapped = null, callable|null $factory = null)
    {
        if ($wrapped instanceof ServerRequestInterface) {
            $this->setWrapped($wrapped);
        }

        if ($factory !== null) {
            $this->setWrappedFactory($factory);
        }
    }
}
