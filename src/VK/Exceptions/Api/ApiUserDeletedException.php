<?php

namespace VK\Exceptions\Api;

class ApiUserDeletedException extends VKApiException {
    /**
     * ApiUserDeletedException constructor.
     * @param $message
     */
    public function __construct($message) {
        parent::__construct(18,  'User was deleted or banned',  $message);
    }
}
