<?php

namespace VK\Exceptions\Api;

class VKApiRequestException extends VKApiException {
    /**
     * VKApiRequestException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(8, 'Invalid request', $message);
    }
}
