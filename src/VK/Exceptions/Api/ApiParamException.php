<?php

namespace VK\Exceptions\Api;

class ApiParamException extends VKApiException {
    /**
     * ApiParamException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(100,  'One of the parameters specified was missing or invalid',  $message);
    }
}
