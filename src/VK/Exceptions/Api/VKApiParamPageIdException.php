<?php

namespace VK\Exceptions\Api;

class VKApiParamPageIdException extends VKApiException {
    /**
     * VKApiParamPageIdException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(140, 'Page not found', $message);
    }
}
