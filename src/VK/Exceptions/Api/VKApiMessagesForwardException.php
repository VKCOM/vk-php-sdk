<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesForwardException extends VKApiException {
    /**
     * VKApiMessagesForwardException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(921, 'Can\'t forward these messages', $error);
    }
}
