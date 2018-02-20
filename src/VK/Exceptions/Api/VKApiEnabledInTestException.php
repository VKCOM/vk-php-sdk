<?php

namespace VK\Exceptions\Api;

class VKApiEnabledInTestException extends VKApiException {
    /**
     * VKApiEnabledInTestException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(11, 'In test mode application should be disabled or user should be authorized', $message);
    }
}
