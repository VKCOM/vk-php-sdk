<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidServerException extends VKApiException {
    /**
     * VKApiInvalidServerException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(118, 'Invalid server', $error);
    }
}
