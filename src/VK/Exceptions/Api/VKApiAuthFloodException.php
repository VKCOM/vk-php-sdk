<?php

namespace VK\Exceptions\Api;

class VKApiAuthFloodException extends VKApiException {
    /**
     * VKApiAuthFloodException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1105, 'Too many auth attempts, try again later', $message);
    }
}
