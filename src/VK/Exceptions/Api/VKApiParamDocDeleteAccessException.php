<?php

namespace VK\Exceptions\Api;

class VKApiParamDocDeleteAccessException extends VKApiException {
    /**
     * VKApiParamDocDeleteAccessException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1151, 'Access to document deleting is denied', $message);
    }
}
