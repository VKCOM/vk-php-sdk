<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiParamDocAccessException extends VKApiException {
    /**
     * VKApiParamDocAccessException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1153, 'Access to document is denied', $error);
    }
}
