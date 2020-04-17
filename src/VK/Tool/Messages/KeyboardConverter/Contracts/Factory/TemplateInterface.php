<?php

namespace VK\Tool\Messages\KeyboardConverter\Contracts\Factory;

interface TemplateInterface
{
    public function getCarouselFactory(): Template\CarouselInterface;
}