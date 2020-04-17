<?php

namespace VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;

use VK\Tool\Messages\KeyboardConverter\Contracts\Convertible\ArrayInterface;

abstract class AbstractButton implements ArrayInterface {

    protected const KEY_ACTION      = 'action';
    protected const KEY_ACTION_TYPE = 'type';

    /**
     * @var array
     */
    protected $button = [];

    public function convert(): array {
        $this->button[self::KEY_ACTION] = $this->convertAction();
        return $this->button;
    }

    abstract protected function action(): array;
    abstract protected function type(): string;

    private function convertAction(): array {
        $action = $this->action();
        $action[self::KEY_ACTION_TYPE] = $this->type();
        return $action;
    }
}
