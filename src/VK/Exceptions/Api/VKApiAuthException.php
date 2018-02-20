<?php

namespace VK\Exceptions\Api;

class VKApiAuthException extends VKApiException {
    /**
     * VKApiAuthException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(5, 'User authorization failed', $message);
    }
}
