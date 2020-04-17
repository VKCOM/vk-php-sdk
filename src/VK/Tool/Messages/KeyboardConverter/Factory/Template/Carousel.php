<?php

namespace VK\Tool\Messages\KeyboardConverter\Factory\Template;

use VK\Tool\Messages\KeyboardConverter\Contracts;
use VK\Tool\Messages\KeyboardConverter\Object as VkObject;

class Carousel implements Contracts\Factory\Template\CarouselInterface
{
    /**
     * @var Contracts\Template\Carousel\Type\FactoryInterface
     */
    private $typeFactory;

    /**
     * @var Contracts\Template\Carousel\Element\FactoryInterface
     */
    private $elementFactory;

    /**
     * @var Contracts\Keyboard\Button\FactoryInterface
     */
    private $buttonFactory;

    public function __construct(Contracts\Keyboard\Button\FactoryInterface $buttonFactory)
    {
        $this->buttonFactory = $buttonFactory;
    }

    public function getTypeFactory(): Contracts\Template\Carousel\Type\FactoryInterface
    {
        if ($this->typeFactory === null) {
            $this->typeFactory = new VkObject\Template\Carousel\Type\Factory(
                $this->getElementFactory(),
                $this->buttonFactory
            );
        }

        return $this->typeFactory;
    }

    public function getElementFactory(): Contracts\Template\Carousel\Element\FactoryInterface
    {
        if ($this->elementFactory === null) {
            $this->elementFactory = new VkObject\Template\Carousel\Element\Factory();
        }

        return $this->elementFactory;
    }
}