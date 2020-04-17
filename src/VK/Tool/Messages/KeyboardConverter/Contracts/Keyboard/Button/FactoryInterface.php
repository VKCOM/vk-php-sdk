<?php

namespace VK\Tool\Messages\KeyboardConverter\Contracts\Keyboard\Button;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Button;

interface FactoryInterface
{
    public function app(string $label, int $appId, string $ownerId, string $hash): Button\App;
    public function location(array $payload): Button\Location;
    public function pay(string $hash): Button\Pay;
    public function text(string $label,array $payload, string $color = Button\Text::COLOR_GREEN): Button\Text;
    public function link(string $label, string $link, array $payload): Button\Link;
}