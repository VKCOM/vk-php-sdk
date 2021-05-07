<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUserNotFoundInChatException extends VKApiException {
    /**
     * VKApiUserNotFoundInChatException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(935, 'User not found in chat', $error);
    }
}
