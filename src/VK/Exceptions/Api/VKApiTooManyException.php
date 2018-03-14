<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiTooManyException extends VKApiException {
    /**
     * VKApiTooManyException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(6, 'Too many requests per second', $error);
    }
}
