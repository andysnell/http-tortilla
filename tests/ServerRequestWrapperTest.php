<?php

declare(strict_types=1);

namespace WickedByte\Tests\Http\Message;

use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\ServerRequestInterface;
use WickedByte\Tests\Http\Message\DataProvider\ServerRequestDataProvider;
use WickedByte\Tests\Http\Message\Fixture\ServerRequestWrapperFixture;

final class ServerRequestWrapperTest extends EvolvingWrapperTestCase
{
    use ServerRequestDataProvider;

    /**
     * @var ObjectProphecy<ServerRequestInterface>
     */
    private ObjectProphecy $mocked_wrapped;

    protected function setUp(): void
    {
        $this->mocked_wrapped = $this->prophesize(ServerRequestInterface::class);
    }

    /**
     * @return ObjectProphecy<ServerRequestInterface>
     */
    protected function mock(): ObjectProphecy
    {
        return $this->mocked_wrapped;
    }

    /**
     * @return class-string<ServerRequestInterface>
     */
    public static function wrapped(): string
    {
        return ServerRequestInterface::class;
    }

    /**
     * @return class-string<ServerRequestWrapperFixture>
     */
    public static function fixture(): string
    {
        return ServerRequestWrapperFixture::class;
    }
}
