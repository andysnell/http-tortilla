<?php

declare(strict_types=1);

namespace WickedByte\Tests\Http\Message\Fixture;

use Psr\Http\Message\MessageInterface;
use WickedByte\Http\Message\MessageWrapper;

final class MessageWrapperFixture implements MessageInterface
{
    use MessageWrapper;

    protected function wrap(MessageInterface $message): static
    {
        return new self($message);
    }

    public function __construct(MessageInterface|null $wrapped = null, callable|null $factory = null)
    {
        if ($wrapped instanceof MessageInterface) {
            $this->setWrapped($wrapped);
        }

        if ($factory !== null) {
            $this->setWrappedFactory($factory);
        }
    }
}
