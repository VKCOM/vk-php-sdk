<?php

namespace VK\Tool\Messages\KeyboardConverter\Contracts\Template\Carousel\Type;

use VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Type\Basic;

interface FactoryInterface
{
    public function basic(callable $callback): Basic;
}