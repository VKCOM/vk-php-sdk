<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiParamPhoneException extends VKApiException {
    /**
     * VKApiParamPhoneException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1000, 'Invalid phone number', $error);
    }
}
