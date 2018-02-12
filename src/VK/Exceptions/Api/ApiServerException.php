<?php

namespace VK\Exceptions\Api;

class ApiServerException extends VKApiException {
    /**
     * ApiServerException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(10,  'Internal server error',  $message);
    }
}
