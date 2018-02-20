<?php

namespace VK\Exceptions\Api;

class VKApiParamDocAccessException extends VKApiException {
    /**
     * VKApiParamDocAccessException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1153, 'Access to document is denied', $message);
    }
}
