<?php

namespace Test\KeyboardConverter\Object\Keyboard\Button;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;

class TextTest extends AbstractButtonTest
{
    protected function getButtonWithNullableFields(): Button\AbstractButton
    {
        return new Button\Text('', []);
    }

    protected function getConvertedToJsonButtonFileName(): string
    {
        return 'text.json';
    }
}
