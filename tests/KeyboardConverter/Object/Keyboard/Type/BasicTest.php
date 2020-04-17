<?php

namespace Test\KeyboardConverter\Object\Keyboard\Type;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Type\AbstractType;
use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Type\Basic;

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
