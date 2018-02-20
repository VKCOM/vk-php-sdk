<?php

namespace VK\Exceptions\Api;

class VKApiAccessVideoException extends VKApiException {
    /**
     * VKApiAccessVideoException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(204, 'Access denied', $message);
    }
}
