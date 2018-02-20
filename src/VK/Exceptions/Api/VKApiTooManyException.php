<?php

namespace VK\Exceptions\Api;

class VKApiTooManyException extends VKApiException {
    /**
     * VKApiTooManyException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(6, 'Too many requests per second', $message);
    }
}
