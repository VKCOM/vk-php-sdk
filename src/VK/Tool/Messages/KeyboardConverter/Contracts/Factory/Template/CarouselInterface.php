<?php

namespace VK\Tool\Messages\KeyboardConverter\Contracts\Factory\Template;

use VK\Tool\Messages\KeyboardConverter\Contracts\Template\Carousel;

interface CarouselInterface
{
    public function getTypeFactory(): Carousel\Type\FactoryInterface;
    public function getElementFactory(): Carousel\Element\FactoryInterface;
}