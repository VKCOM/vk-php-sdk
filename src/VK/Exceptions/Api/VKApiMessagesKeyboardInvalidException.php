<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesKeyboardInvalidException extends VKApiException {
    /**
     * VKApiMessagesKeyboardInvalidException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(911, 'Keyboard format is invalid', $error);
    }
}
