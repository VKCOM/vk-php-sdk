<?php

namespace VK\Exceptions\Api;

class VKApiMethodDisabledException extends VKApiException {
    /**
     * VKApiMethodDisabledException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(23, 'This method was disabled', $message);
    }
}
