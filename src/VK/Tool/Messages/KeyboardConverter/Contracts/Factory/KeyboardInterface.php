<?php

namespace VK\Tool\Messages\KeyboardConverter\Contracts\Factory;

use VK\Tool\Messages\KeyboardConverter\Contracts\Keyboard;

interface KeyboardInterface
{
    public function getTypeFactory(): Keyboard\Type\FactoryInterface;
    public function getButtonFactory(): Keyboard\Button\FactoryInterface;
}