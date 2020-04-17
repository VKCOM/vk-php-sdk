<?php

namespace Test\KeyboardConverter\Object\Keyboard;

use PHPUnit\Framework\MockObject\MockObject;
use VK\Tool\Messages\KeyboardConverter\Object as VkObject;
use VK\Tool\Messages\KeyboardConverter\Contracts;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    /**
     * @var VkObject\Keyboard\Converter
     */
    private $converter;

    /**
     * @var Contracts\Keyboard\Type\FactoryInterface|MockObject
     */
    private $factory;

    public function setUp(): void
    {
        $this->factory   = $this->createMock(Contracts\Keyboard\Type\FactoryInterface::class);
        $this->converter = new VkObject\Keyboard\Converter($this->factory);
    }

    public function testInline()
    {
        $inline = $this->createMock(VkObject\Keyboard\Type\Inline::class);
        $this->factory
            ->expects($this->once())
            ->method('inline')
            ->willReturn($inline);
        $inline
            ->expects($this->once())
            ->method('convert');

        $this->converter->inline(function (Contracts\Keyboard\Button\FactoryInterface $factory) {
            return [
                [
                    $factory->text('::test::', [])
                ]
            ];
        });
    }

    public function testBasic()
    {
        $basic = $this->createMock(VkObject\Keyboard\Type\Basic::class);
        $this->factory
            ->expects($this->once())
            ->method('basic')
            ->willReturn($basic);
        $basic
            ->expects($this->once())
            ->method('convert');

        $this->converter->basic(function () {
            return [[]];
        });
    }
}
