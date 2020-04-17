<?php

namespace Test\KeyboardConverter\Factory;

use PHPUnit\Framework\MockObject\MockObject;
use VK\Tool\Messages\KeyboardConverter\Contracts\Factory\TemplateInterface;
use PHPUnit\Framework\TestCase;
use VK\Tool\Messages\KeyboardConverter\Contracts\Keyboard\Button\FactoryInterface;
use VK\Tool\Messages\KeyboardConverter\Factory\Template;
use VK\Tool\Messages\KeyboardConverter\Factory\Template\Carousel;

class TemplateTest extends TestCase
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var FactoryInterface|MockObject
     */
    private $buttonFactory;

    public function setUp(): void
    {
        $this->buttonFactory = $this->createMock(FactoryInterface::class);
        $this->template      = new Template($this->buttonFactory);
    }

    public function testGetCarouselFactory()
    {
        $carouselFactory = $this->template->getCarouselFactory();
        $this->assertSame($carouselFactory, $this->template->getCarouselFactory());
        $this->assertInstanceOf(Carousel::class, $carouselFactory);
    }
}
