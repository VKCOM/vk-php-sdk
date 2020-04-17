<?php
/**
 * Created by PhpStorm.
 * User: n0tm
 * Date: 15.12.19
 * Time: 2:58
 */

namespace VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Type;

use VK\Tool\Messages\KeyboardConverter\Contracts\Template\Carousel;
use VK\Tool\Messages\KeyboardConverter\Contracts\Keyboard;

class Factory implements Carousel\Type\FactoryInterface
{
    /**
     * @var Carousel\Element\FactoryInterface
     */
    private $elementFactory;

    /**
     * @var Keyboard\Button\FactoryInterface
     */
    private $buttonFactory;

    public function __construct(Carousel\Element\FactoryInterface $elementFactory, Keyboard\Button\FactoryInterface $buttonFactory)
    {
        $this->elementFactory = $elementFactory;
        $this->buttonFactory  = $buttonFactory;
    }

    public function basic(callable $callback): Basic
    {
        return new Basic($this->callUserFunctionWithElementsFactory($callback));
    }

    private function callUserFunctionWithElementsFactory(callable $function): array
    {
        return call_user_func($function, $this->elementFactory, $this->buttonFactory);
    }
}