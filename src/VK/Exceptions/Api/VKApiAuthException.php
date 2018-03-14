<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAuthException extends VKApiException {
    /**
     * VKApiAuthException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(5, 'User authorization failed', $error);
    }
}
