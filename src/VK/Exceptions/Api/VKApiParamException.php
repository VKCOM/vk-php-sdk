<?php

namespace VK\Exceptions\Api;

class VKApiParamException extends VKApiException {
    /**
     * VKApiParamException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(100, 'One of the parameters specified was missing or invalid', $message);
    }
}
