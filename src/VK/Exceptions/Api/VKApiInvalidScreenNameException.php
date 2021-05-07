<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidScreenNameException extends VKApiException {
    /**
     * VKApiInvalidScreenNameException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1260, 'Invalid screen name', $error);
    }
}
