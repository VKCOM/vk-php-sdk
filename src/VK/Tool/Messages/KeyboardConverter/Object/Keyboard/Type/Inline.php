<?php

namespace VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Type;

class Inline extends AbstractType {

    private const KEY_INLINE = 'inline';

    public function __construct(array $buttons) {
        $this->buttons = $buttons;
        $this->keyboard[self::KEY_INLINE] = true;
    }

}