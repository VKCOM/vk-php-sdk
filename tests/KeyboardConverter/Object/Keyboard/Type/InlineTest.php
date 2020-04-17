<?php

namespace Test\KeyboardConverter\Object\Keyboard\Type;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Type\AbstractType;
use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Type\Inline;

class InlineTest extends AbstractTypeTest
{
    protected function getTypeWithNullableFields(): AbstractType
    {
        return new Inline([]);
    }

    protected function getConvertedToJsonTypeFileName(): string
    {
        return 'inline.json';
    }
}
