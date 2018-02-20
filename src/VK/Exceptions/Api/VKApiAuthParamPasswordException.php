<?php

namespace VK\Exceptions\Api;

class VKApiAuthParamPasswordException extends VKApiException {
    /**
     * VKApiAuthParamPasswordException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1111, 'Invalid password', $message);
    }
}
