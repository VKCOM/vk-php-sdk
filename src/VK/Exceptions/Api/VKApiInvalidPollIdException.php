<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidPollIdException extends VKApiException {
    /**
     * VKApiInvalidPollIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(251, 'Invalid poll id', $error);
    }
}
