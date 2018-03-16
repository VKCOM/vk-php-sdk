<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessagesForwardAmountExceededException extends VKApiException {
    /**
     * VKApiMessagesForwardAmountExceededException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(913, 'Too many forwarded messages', $error);
    }
}
