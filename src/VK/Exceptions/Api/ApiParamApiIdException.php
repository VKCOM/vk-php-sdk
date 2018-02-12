<?php

namespace VK\Exceptions\Api;

class ApiParamApiIdException extends VKApiException {
    /**
     * ApiParamApiIdException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(101,  'Invalid application API ID',  $message);
    }
}
