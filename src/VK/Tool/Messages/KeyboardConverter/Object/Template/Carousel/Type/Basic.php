<?php
/**
 * Created by PhpStorm.
 * User: n0tm
 * Date: 15.12.19
 * Time: 0:17
 */

namespace VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Type;

class Basic extends AbstractType {

    public function __construct(array $elements) {
        $this->elements = $elements;
    }
}