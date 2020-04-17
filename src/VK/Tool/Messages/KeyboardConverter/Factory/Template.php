<?php

namespace VK\Tool\Messages\KeyboardConverter\Factory;

use VK\Tool\Messages\KeyboardConverter\Contracts;

class Template implements Contracts\Factory\TemplateInterface
{
    /**
     * @var Template\Carousel
     */
    private $carouselFactory;

    /**
     * @var Contracts\Keyboard\Button\FactoryInterface
     */
    private $buttonFactory;

    public function __construct(Contracts\Keyboard\Button\FactoryInterface $buttonFactory)
    {
        $this->buttonFactory = $buttonFactory;
    }

    public function getCarouselFactory(): Contracts\Factory\Template\CarouselInterface
    {
        if ($this->carouselFactory === null) {
            $this->carouselFactory = new Template\Carousel($this->buttonFactory);
        }

        return $this->carouselFactory;
    }
}