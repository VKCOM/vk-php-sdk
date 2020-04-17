<?php
/**
 * Created by PhpStorm.
 * User: n0tm
 * Date: 15.12.19
 * Time: 2:33
 */

namespace VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Element;


class OpenPhoto extends AbstractElement {

    protected function action(): array {
        return [];
    }

    protected function type(): string {
        return 'open_photo';
    }
}