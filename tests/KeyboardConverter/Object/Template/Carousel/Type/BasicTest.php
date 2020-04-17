<?php

namespace Test\KeyboardConverter\Object\Template\Carousel\Type;

use VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Type\AbstractType;
use VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Type\Basic;

class BasicTest extends AbstractTypeTest
{
    protected function getTypeWithNullableFields(): AbstractType
    {
        return new Basic([]);
    }

    protected function getConvertedToJsonTypeFileName(): string
    {
        return 'basic.json';
    }

}
