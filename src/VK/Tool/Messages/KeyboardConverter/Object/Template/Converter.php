<?php

namespace VK\Tool\Messages\KeyboardConverter\Object\Template;

use VK\Tool\Messages\KeyboardConverter\Contracts\Template\Carousel\Type\FactoryInterface;

class Converter
{
    public function carousel(FactoryInterface $factory): Carousel\Converter
    {
        return new Carousel\Converter($factory);
    }
}