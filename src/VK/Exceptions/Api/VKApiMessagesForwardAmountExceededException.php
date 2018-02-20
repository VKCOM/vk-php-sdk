<?php

namespace VK\Exceptions\Api;

class VKApiMessagesForwardAmountExceededException extends VKApiException {
    /**
     * VKApiMessagesForwardAmountExceededException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(913, 'Too many forwarded messages', $message);
    }
}
