<?php

namespace VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;

class Text extends AbstractButton {

    public const COLOR_BLUE  = 'primary';
    public const COLOR_RED   = 'negative';
    public const COLOR_GREEN = 'positive';
    public const COLOR_GRAY  = 'secondary';

    private const KEY_COLOR = 'color';

    /**
     * @var array
     */
    private $payload;

    /**
     * @var string
     */
    private $label;

    public function __construct(string $label, array $payload, string $color = self::COLOR_GREEN) {
        $this->label   = $label;
        $this->payload = $payload;
        $this->button[self::KEY_COLOR] = $color;
    }

    protected function action(): array {
        return [
            'payload' => json_encode($this->payload, JSON_UNESCAPED_UNICODE),
            'label'   => $this->label
        ];
    }

    protected function type(): string {
        return 'text';
    }
}