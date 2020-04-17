<?php

namespace Test\KeyboardConverter\Object\Keyboard\Button;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button\AbstractButton;
use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button\Location;

class LocationTest extends AbstractButtonTest
{
    protected function getButtonWithNullableFields(): AbstractButton
    {
        return new Location([]);
    }

    protected function getConvertedToJsonButtonFileName(): string
    {
        return 'location.json';
    }
}
