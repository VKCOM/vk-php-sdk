<?php

namespace Test\KeyboardConverter\Object\Template\Carousel;

use PHPUnit\Framework\MockObject\MockObject;
use VK\Tool\Messages\KeyboardConverter\Contracts;
use VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Converter;
use PHPUnit\Framework\TestCase;
use VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel;

class ConverterTest extends TestCase
{
    /**
     * @var Contracts\Template\Carousel\Type\FactoryInterface|MockObject
     */
    private $factory;

    /**
     * @var Converter
     */
    private $converter;

    public function setUp(): void
    {
        $this->factory  = $this->createMock(Contracts\Template\Carousel\Type\FactoryInterface::class);
        $this->converter = new Converter($this->factory);
    }

    public function testBasic()
    {
        $basic = $this->createMock(Carousel\Type\Basic::class);
        $basic->expects($this->once())
            ->method('convert');

        $this->factory->expects($this->once())
            ->method('basic')
            ->willReturn($basic);

        $this->converter->basic(function () {
            return [];
        });
    }
}
