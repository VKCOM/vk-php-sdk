<?php

namespace Test\KeyboardConverter\Object\Keyboard\Button;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /**
     * @var Button\Factory
     */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new Button\Factory();
    }

    public function testApp(): void
    {
        $app = new Button\App('::test::',0, '::test::', '::test::');
        $this->assertEquals($app, $this->factory->app('::test::', 0, '::test::', '::test::'));
    }

    public function testPay()
    {
        $pay = new Button\Pay('::test::');
        $this->assertEquals($pay, $this->factory->pay('::test::'));
    }

    public function testLocation()
    {
        $location = new Button\Location([]);
        $this->assertEquals($location, $this->factory->location([]));
    }

    public function testLink()
    {
        $link = new Button\Link('::test::','::test::', []);
        $this->assertEquals($link, $this->factory->link('::test::','::test::', []));
    }

    public function testText()
    {
        $text = new Button\Text('::test::',[]);
        $this->assertEquals($text, $this->factory->text('::test::',[]));
    }
}
