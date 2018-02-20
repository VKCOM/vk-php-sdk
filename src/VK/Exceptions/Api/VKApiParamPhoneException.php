<?php

namespace VK\Exceptions\Api;

class VKApiParamPhoneException extends VKApiException {
    /**
     * VKApiParamPhoneException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1000, 'Invalid phone number', $message);
    }
}
