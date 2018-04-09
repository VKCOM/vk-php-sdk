<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiRateLimitException extends VKApiException {
    /**
     * VKApiRateLimitException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(29, 'Rate limit reached', $error);
    }
}
