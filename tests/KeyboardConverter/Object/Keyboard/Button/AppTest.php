<?php

namespace Test\KeyboardConverter\Object\Keyboard\Button;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button\AbstractButton;
use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button\App;

class AppTest extends AbstractButtonTest
{
    protected function getButtonWithNullableFields(): AbstractButton
    {
        return new App('', 0, '', '');
    }

    protected function getConvertedToJsonButtonFileName(): string
    {
        return 'app.json';
    }
}
