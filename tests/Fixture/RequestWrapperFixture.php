<?php

declare(strict_types=1);

namespace PhoneBurner\Tests\Http\Message\Fixture;

use PhoneBurner\Http\Message\RequestWrapper;
use Psr\Http\Message\RequestInterface;

class RequestWrapperFixture implements RequestInterface
{
    use RequestWrapper;

    protected function wrap(RequestInterface $message): static
    {
        return new self($message);
    }

    public function __construct(RequestInterface|null $wrapped = null, callable|null $factory = null)
    {
        if ($wrapped instanceof RequestInterface) {
            $this->setWrapped($wrapped);
        }

        if (null !== $factory) {
            $this->setWrappedFactory($factory);
        }
    }
}
