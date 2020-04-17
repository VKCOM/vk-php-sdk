<?php
/**
 * Created by PhpStorm.
 * User: n0tm
 * Date: 15.12.19
 * Time: 1:05
 */

namespace VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;

class Link extends AbstractButton {

    private const KEY_LINK    = 'link';
    private const KEY_LABEL   = 'label';
    private const KEY_PAYLOAD = 'payload';

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $label;

    /**
     * @var array
     */
    private $payload;

    public function __construct(string $label, string $link, array $payload = []) {
        $this->label   = $label;
        $this->link    = $link;
        $this->payload = $payload;
    }

    protected function action(): array {
        return [
            self::KEY_LINK    => $this->link,
            self::KEY_LABEL   => $this->label,
            self::KEY_PAYLOAD => json_encode($this->payload, JSON_UNESCAPED_UNICODE)
        ];
    }

    protected function type(): string {
        return 'open_link';
    }
}