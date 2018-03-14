<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiParamUserIdException extends VKApiException {
    /**
     * VKApiParamUserIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(113, 'Invalid user id', $error);
    }
}
