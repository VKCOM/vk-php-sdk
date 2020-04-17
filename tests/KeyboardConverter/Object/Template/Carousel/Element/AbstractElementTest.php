<?php

namespace Test\KeyboardConverter\Object\Template\Carousel\Element;

use VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Element\AbstractElement;
use Test\KeyboardConverter\Object\AbstractJsonConvertibleTest;

abstract class AbstractElementTest extends AbstractJsonConvertibleTest
{
    public function testConvert(): void
    {
        $element = $this->getElementWithNullableFields();
        $convertedToJsonButtonFileName = $this->getConvertedToJsonElementFileName();
        $this->assertSame(
            json_decode($this->getExpectedJsonByFileName($convertedToJsonButtonFileName), true),
            $element->convert()
        );
    }

    protected function getJsonFolderPath(): string
    {
        return __DIR__.'\\converted_to_json_elements';
    }

    abstract protected function getElementWithNullableFields(): AbstractElement;
    abstract protected function getConvertedToJsonElementFileName(): string;
}