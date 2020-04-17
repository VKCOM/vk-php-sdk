<?php

namespace VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;

class App extends AbstractButton {

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $ownerId;

    /**
     * @var int
     */
    private $appId;

    public function __construct(string $label, int $appId, string $ownerId, string $hash) {
        $this->label   = $label;
        $this->appId   = $appId;
        $this->ownerId = $ownerId;
        $this->hash    = $hash;
    }

    protected function action(): array {
        return [
            'app_id' => $this->appId,
            'owner_id' => $this->ownerId,
            'hash' => $this->hash,
            'label' => $this->label
        ];
    }

    protected function type(): string {
        return 'open_app';
    }
}