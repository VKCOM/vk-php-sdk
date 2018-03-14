<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAuthParamPasswordException extends VKApiException {
    /**
     * VKApiAuthParamPasswordException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1111, 'Invalid password', $error);
    }
}
