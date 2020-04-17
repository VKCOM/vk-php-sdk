<?php

namespace VK\Tool\Messages\KeyboardConverter\Contracts;

interface FactoryInterface
{
    public function getTemplateFactory(): Factory\TemplateInterface;
    public function getKeyboardFactory(): Factory\KeyboardInterface;
}