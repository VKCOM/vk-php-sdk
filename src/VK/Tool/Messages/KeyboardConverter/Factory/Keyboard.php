<?php

namespace VK\Tool\Messages\KeyboardConverter\Factory;

use VK\Tool\Messages\KeyboardConverter\Contracts;
use VK\Tool\Messages\KeyboardConverter\Object as VkObject;

class Keyboard implements Contracts\Factory\KeyboardInterface
{
    /**
     * @var Contracts\Keyboard\Type\FactoryInterface
     */
    private $typeFactory;

    /**
     * @var Contracts\Keyboard\Button\FactoryInterface
     */
    private $buttonFactory;

    public function getTypeFactory(): Contracts\Keyboard\Type\FactoryInterface
    {
        if ($this->typeFactory === null) {
            $this->typeFactory = new VkObject\Keyboard\Type\Factory($this->getButtonFactory());
        }

        return $this->typeFactory;
    }

    public function getButtonFactory(): Contracts\Keyboard\Button\FactoryInterface
    {
        if ($this->buttonFactory === null) {
            $this->buttonFactory = new VkObject\Keyboard\Button\Factory();
        }

        return $this->buttonFactory;
    }
}