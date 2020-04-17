<?php
/**
 * Created by PhpStorm.
 * User: n0tm
 * Date: 15.12.19
 * Time: 2:02
 */

namespace VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Element;

use VK\Tool\Messages\KeyboardConverter\Contracts\Convertible\ArrayInterface;
use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button\AbstractButton;

abstract class AbstractElement implements ArrayInterface {

    private const KEY_ACTION      = 'action';
    private const KEY_ACTION_TYPE = 'type';
    private const KEY_TITLE       = 'title';
    private const KEY_DESCRIPTION = 'description';
    private const KEY_PHOTO_ID    = 'photo_id';
    private const KEY_BUTTONS     = 'buttons';

    /**
     * @var array
     */
    protected $element = [];

    public function __construct(array $buttons, ?string $title = null, ?string $description = null, ?string $photoId = null) {
        $this->element[self::KEY_BUTTONS] = array_map(function ($button): array {
            if ($button instanceof AbstractButton) {
                return $button->convert();
            }

            return $button;
        }, $buttons);

        if ($title !== null) {
            $this->element[self::KEY_TITLE] = $title;
        }

        if ($description !== null) {
            $this->element[self::KEY_DESCRIPTION] = $description;
        }

        if ($photoId !== null) {
            $this->element[self::KEY_PHOTO_ID] = $photoId;
        }

    }

    public function convert(): array {
        $this->element[self::KEY_ACTION] = $this->convertAction();
        return $this->element;
    }

    abstract protected function action(): array;
    abstract protected function type(): string;

    private function convertAction(): array {
        $action = $this->action();
        $action[self::KEY_ACTION_TYPE] = $this->type();
        return $action;
    }
}
