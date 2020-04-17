<?php

namespace Test\KeyboardConverter;

use PHPUnit\Framework\TestCase;
use VK\Tool\Messages\KeyboardConverter\Factory;

class FactoryTest extends TestCase
{
    /**
     * @var Factory
     */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new Factory();
    }

    public function testGetTemplateFactory(): void
    {
        $templateFactory = $this->factory->getTemplateFactory();
        $this->assertInstanceOf(Factory\Template::class, $templateFactory);
        $this->assertSame($templateFactory, $this->factory->getTemplateFactory());
    }

    public function testGetKeyboardFactory(): void
    {
        $keyboardFactory = $this->factory->getKeyboardFactory();
        $this->assertInstanceOf(Factory\Keyboard::class, $keyboardFactory);
        $this->assertSame($keyboardFactory, $this->factory->getKeyboardFactory());
    }
}
