<?php

namespace VK\Exceptions\Api;

class VKApiAuthHttpsException extends VKApiException {
    /**
     * VKApiAuthHttpsException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(16, 'HTTP authorization failed', $message);
    }
}
