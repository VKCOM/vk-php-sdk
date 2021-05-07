<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiIncorrectReplyPrivacyException extends VKApiException {
    /**
     * VKApiIncorrectReplyPrivacyException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1602, 'Incorrect reply privacy', $error);
    }
}
