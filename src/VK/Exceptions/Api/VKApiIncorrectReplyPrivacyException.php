<?php

namespace VK\Exceptions\Api;

class VKApiIncorrectReplyPrivacyException extends VKApiException {
    /**
     * VKApiIncorrectReplyPrivacyException constructor.
     * @param string $message
     */
    public function __construct(string $message) {
        parent::__construct(1602, 'Incorrect reply privacy', $message);
    }
}
