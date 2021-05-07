<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessageIsTooLongException extends VKApiException {
    /**
     * VKApiMessageIsTooLongException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(914, 'Message is too long', $error);
    }
}
