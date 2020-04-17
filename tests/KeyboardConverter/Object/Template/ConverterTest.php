<?php

namespace Test\KeyboardConverter\Object\Template;

use VK\Tool\Messages\KeyboardConverter\Object\Template\Converter;
use PHPUnit\Framework\TestCase;
use VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel;
use VK\Tool\Messages\KeyboardConverter\Object\Keyboard;

class ConverterTest extends TestCase
{
    /**
     * @var Converter
     */
    private $converter;

    public function setUp(): void
    {
        $this->converter = new Converter();
    }

    public function testCarousel()
    {
        $elementFactory = new Carousel\Element\Factory();
        $buttonFactory  = new Keyboard\Button\Factory();
        $typeFactory = new Carousel\Type\Factory($elementFactory, $buttonFactory);
        $this->assertEquals(new Carousel\Converter($typeFactory), $this->converter->carousel($typeFactory));
    }
}
