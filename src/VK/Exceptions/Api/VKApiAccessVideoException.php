<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAccessVideoException extends VKApiException {
    /**
     * VKApiAccessVideoException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(204, 'Access denied', $error);
    }
}
