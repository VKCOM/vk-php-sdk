<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiApplicationHasInsufficientFundsException extends VKApiException {
    /**
     * VKApiApplicationHasInsufficientFundsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(147, 'Application has insufficient funds', $error);
    }
}
