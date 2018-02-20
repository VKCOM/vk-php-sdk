<?php

namespace VK\Exceptions\Api;

class VKApiParamHashException extends VKApiException {
    /**
     * VKApiParamHashException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(121, 'Invalid hash', $message);
    }
}
