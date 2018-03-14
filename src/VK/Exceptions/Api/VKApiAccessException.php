<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAccessException extends VKApiException {
    /**
     * VKApiAccessException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(15, 'Access denied', $error);
    }
}
