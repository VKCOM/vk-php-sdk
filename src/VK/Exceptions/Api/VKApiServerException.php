<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiServerException extends VKApiException {
    /**
     * VKApiServerException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(10, 'Internal server error', $error);
    }
}
