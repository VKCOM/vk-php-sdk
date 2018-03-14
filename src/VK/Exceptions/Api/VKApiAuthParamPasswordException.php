<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAuthParamPasswordException extends VKApiException {
    /**
     * VKApiAuthParamPasswordException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1111, 'Invalid password', $error);
    }
}
