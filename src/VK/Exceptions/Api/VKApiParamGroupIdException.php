<?php

namespace VK\Exceptions\Api;

class VKApiParamGroupIdException extends VKApiException {
    /**
     * VKApiParamGroupIdException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(125, 'Invalid group id', $message);
    }
}
