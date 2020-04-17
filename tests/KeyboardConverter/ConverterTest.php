<?php

namespace Test\KeyboardConverter;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use VK\Tool\Messages\KeyboardConverter\Contracts;
use VK\Tool\Messages\KeyboardConverter\Converter;

class ConverterTest extends TestCase
{
    /**
     * @var Converter
     */
    private $converter;

    /**
     * @var Contracts\FactoryInterface|MockObject
     */
    private $factory;

    public function setUp(): void
    {
        $this->factory = $this->createMock(Contracts\FactoryInterface::class);
        $this->converter = new Converter($this->factory);
    }

    public function testKeyboard(): void
    {
        $keyboardFactory = $this->createMock(Contracts\Factory\KeyboardInterface::class);
        $this->factory
            ->method('getKeyboardFactory')
            ->willReturn($keyboardFactory);

        $this->factory
            ->expects($this->once())
            ->method('getKeyboardFactory');
        $keyboardFactory
            ->expects($this->once())
            ->method('getTypeFactory');

        $keyboard = $this->converter->keyboard();
        $this->assertSame($keyboard, $this->converter->keyboard());
    }

    public function testCarousel(): void
    {
        $templateFactory = $this->createMock(Contracts\Factory\TemplateInterface::class);
        $this->factory
            ->method('getTemplateFactory')
            ->willReturn($templateFactory);

        $carouselFactory = $this->createMock(Contracts\Factory\Template\CarouselInterface::class);
        $templateFactory
            ->expects($this->once())
            ->method('getCarouselFactory')
            ->willReturn($carouselFactory);

        $typeFactory = $this->createMock(Contracts\Template\Carousel\Type\FactoryInterface::class);
        $carouselFactory
            ->expects($this->once())
            ->method('getTypeFactory')
            ->willReturn($typeFactory);

        $carousel = $this->converter->carousel();
        $this->assertSame($carousel, $this->converter->carousel());
    }
}
