<?php

namespace VK\Exceptions\Api;

class ApiUnknownException extends VKApiException {
    /**
     * ApiUnknownException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(1,  'Unknown error occurred',  $message);
    }
}
