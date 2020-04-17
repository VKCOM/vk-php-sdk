<?php

namespace VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel;

use VK\Tool\Messages\KeyboardConverter\Contracts\Template\Carousel\Type\FactoryInterface;

class Converter
{
    /**
     * @var FactoryInterface
     */
    private $carouselTypeFactory;

    public function __construct(FactoryInterface $carouselTypeFactory)
    {
        $this->carouselTypeFactory = $carouselTypeFactory;
    }

    public function basic(callable $callback): string
    {
        return $this->carouselTypeFactory->basic($callback)->convert();
    }
}