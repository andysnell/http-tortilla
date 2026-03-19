<?php

declare(strict_types=1);

namespace WickedByte\Tests\Http\Message;

use Prophecy\Prophecy\ObjectProphecy;
use Psr\Http\Message\RequestInterface;
use WickedByte\Tests\Http\Message\DataProvider\RequestDataProvider;
use WickedByte\Tests\Http\Message\Fixture\RequestWrapperFixture;

final class RequestWrapperTest extends EvolvingWrapperTestCase
{
    use RequestDataProvider;

    /**
     * @var ObjectProphecy<RequestInterface>
     */
    private ObjectProphecy $mocked_wrapped;

    protected function setUp(): void
    {
        $this->mocked_wrapped = $this->prophesize(RequestInterface::class);
    }

    /**
     * @return ObjectProphecy<RequestInterface>
     */
    protected function mock(): ObjectProphecy
    {
        return $this->mocked_wrapped;
    }

    /**
     * @return class-string<RequestInterface>
     */
    public static function wrapped(): string
    {
        return RequestInterface::class;
    }

    /**
     * @return class-string<RequestWrapperFixture>
     */
    public static function fixture(): string
    {
        return RequestWrapperFixture::class;
    }
}
