<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidHashException extends VKApiException {
    /**
     * VKApiInvalidHashException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(121, 'Invalid hash', $error);
    }
}
