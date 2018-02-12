<?php

namespace VK\Exceptions\Api;

class ApiTooManyException extends VKApiException {
    /**
     * ApiTooManyException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(6,  'Too many requests per second',  $message);
    }
}
