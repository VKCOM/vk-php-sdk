<?php

namespace VK\Exceptions\Api;

class VKApiParamApiIdException extends VKApiException {
    /**
     * VKApiParamApiIdException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(101, 'Invalid application API ID', $message);
    }
}
