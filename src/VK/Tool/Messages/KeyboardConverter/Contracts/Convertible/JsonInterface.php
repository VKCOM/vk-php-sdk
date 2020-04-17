<?php

namespace VK\Tool\Messages\KeyboardConverter\Contracts\Convertible;

interface JsonInterface {
    public function convert(): string;
}