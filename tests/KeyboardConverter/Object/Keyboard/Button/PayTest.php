<?php

namespace Test\KeyboardConverter\Object\Keyboard\Button;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;

class PayTest extends AbstractButtonTest
{
    protected function getButtonWithNullableFields(): Button\AbstractButton
    {
        return new Button\Pay('');
    }

    protected function getConvertedToJsonButtonFileName(): string
    {
        return 'pay.json';
    }
}
