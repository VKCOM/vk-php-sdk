<?php

namespace VK\Exceptions\Api;

class VKApiFloodException extends VKApiException {
    /**
     * VKApiFloodException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(9, 'Flood control', $message);
    }
}
