<?php

namespace VK\Exceptions\Api;

class VKApiParamUserIdException extends VKApiException {
    /**
     * VKApiParamUserIdException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(113, 'Invalid user id', $message);
    }
}
