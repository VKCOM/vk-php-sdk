<?php

namespace VK\Exceptions\Api;

class ApiParamUserIdException extends VKApiException {
    /**
     * ApiParamUserIdException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(113,  'Invalid user id',  $message);
    }
}
