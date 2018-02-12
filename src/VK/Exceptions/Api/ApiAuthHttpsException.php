<?php

namespace VK\Exceptions\Api;

class ApiAuthHttpsException extends VKApiException {
    /**
     * ApiAuthHttpsException constructor.
     * @param string $message
     */
    public function __construct($message) {
        parent::__construct(16,  'HTTP authorization failed',  $message);
    }
}
