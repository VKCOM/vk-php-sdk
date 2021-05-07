<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyCardsException extends VKApiException {
    /**
     * VKApiTooManyCardsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1901, 'Too many cards', $error);
    }
}
