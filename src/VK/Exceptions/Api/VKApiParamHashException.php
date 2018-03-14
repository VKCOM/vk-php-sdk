<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiParamHashException extends VKApiException {
    /**
     * VKApiParamHashException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(121, 'Invalid hash', $error);
    }
}
