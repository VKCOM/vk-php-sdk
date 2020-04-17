<?php

namespace VK\Tool\Messages\KeyboardConverter\Contracts\Keyboard\Type;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Type;

interface FactoryInterface
{
    public function basic(callable $callback, bool $oneTime = true): Type\Basic;
    public function inline(callable $callback): Type\Inline;
}