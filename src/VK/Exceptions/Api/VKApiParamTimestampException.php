<?php

namespace VK\Exceptions\Api;

class VKApiParamTimestampException extends VKApiException {
    /**
     * VKApiParamTimestampException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(150, 'Invalid timestamp', $message);
    }
}
