<?php

declare(strict_types=1);

namespace WickedByte\Tests\Http\Message\Fixture;

use Psr\Http\Message\UploadedFileInterface;
use WickedByte\Http\Message\UploadedFileWrapper;

class UploadedFileWrapperFixture implements UploadedFileInterface
{
    use UploadedFileWrapper;

    public function __construct(UploadedFileInterface|null $wrapped = null, callable|null $factory = null)
    {
        if ($wrapped instanceof UploadedFileInterface) {
            $this->setWrapped($wrapped);
        }

        if ($factory !== null) {
            $this->setWrappedFactory($factory);
        }
    }
}
