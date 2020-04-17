<?php
/**
 * Created by PhpStorm.
 * User: n0tm
 * Date: 14.12.19
 * Time: 17:59
 */

namespace VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Type;

use VK\Tool\Messages\KeyboardConverter\Contracts\Convertible\JsonInterface;
use VK\Tool\Messages\KeyboardConverter\Object\Template\Carousel\Element\AbstractElement;

abstract class AbstractType implements JsonInterface {

    protected const KEY_ELEMENTS = 'elements';
    protected const KEY_TYPE     = 'type';

    private const TYPE = 'carousel';

    /**
     * @var array
     */
    protected $template = [];

    /**
     * @var AbstractElement[]
     */
    protected $elements;


    public function convert(): string {
        $this->template[self::KEY_ELEMENTS] = array_map(function (AbstractElement $element): array {
            return $element->convert();
        }, $this->elements);
        $this->template[self::KEY_TYPE] = self::TYPE;
        return json_encode($this->template, JSON_UNESCAPED_UNICODE);
    }

}