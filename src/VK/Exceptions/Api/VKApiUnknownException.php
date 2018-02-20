<?php

namespace VK\Exceptions\Api;

class VKApiUnknownException extends VKApiException {
    /**
     * VKApiUnknownException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1, 'Unknown error occurred', $message);
    }
}
