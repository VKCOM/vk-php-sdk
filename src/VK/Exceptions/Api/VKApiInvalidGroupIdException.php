<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidGroupIdException extends VKApiException {
    /**
     * VKApiInvalidGroupIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(125, 'Invalid group id', $error);
    }
}
