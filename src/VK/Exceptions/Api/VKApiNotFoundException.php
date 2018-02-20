<?php

namespace VK\Exceptions\Api;

class VKApiNotFoundException extends VKApiException {
    /**
     * VKApiNotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(104, 'Not found', $message);
    }
}
