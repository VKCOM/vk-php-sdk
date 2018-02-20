<?php

namespace VK\Exceptions\Api;

class VKApiAuthParamCodeException extends VKApiException {
    /**
     * VKApiAuthParamCodeException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1110, 'Incorrect code', $message);
    }
}
