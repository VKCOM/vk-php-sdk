<?php

namespace VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;

class Location extends AbstractButton {

    /**
     * @var array
     */
    private $payload;

    public function __construct(array $payload) {
        $this->payload = $payload;
    }

    protected function action(): array {
        return [
            'payload' => json_encode($this->payload, JSON_UNESCAPED_UNICODE)
        ];
    }

    protected function type(): string {
        return 'location';

    }
}