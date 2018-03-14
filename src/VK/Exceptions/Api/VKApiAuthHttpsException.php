<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAuthHttpsException extends VKApiException {
    /**
     * VKApiAuthHttpsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(16, 'HTTP authorization failed', $error);
    }
}
