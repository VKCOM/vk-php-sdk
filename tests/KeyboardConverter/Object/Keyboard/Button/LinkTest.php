<?php

namespace Test\KeyboardConverter\Object\Keyboard\Button;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button\AbstractButton;
use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button\Link;

class LinkTest extends AbstractButtonTest
{
    protected function getButtonWithNullableFields(): AbstractButton
    {
        return new Link('', '');
    }

    protected function getConvertedToJsonButtonFileName(): string
    {
        return 'link.json';
    }

}
