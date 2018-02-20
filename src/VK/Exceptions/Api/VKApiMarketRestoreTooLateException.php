<?php

namespace VK\Exceptions\Api;

class VKApiMarketRestoreTooLateException extends VKApiException {
    /**
     * VKApiMarketRestoreTooLateException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1400, 'Too late for restore', $message);
    }
}
