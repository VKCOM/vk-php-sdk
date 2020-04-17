<?php
/**
 * Created by PhpStorm.
 * User: n0tm
 * Date: 14.12.19
 * Time: 18:00
 */

namespace VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Type;

class Basic extends AbstractType {

    private const KEY_ONE_TIME = 'one_time';

    public function __construct(array $buttons, bool $oneTime = true) {
        $this->buttons = $buttons;
        $this->keyboard[self::KEY_ONE_TIME] = $oneTime;
    }

}