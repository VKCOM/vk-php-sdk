<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiLimitsException extends VKApiException {
    /**
     * VKApiLimitsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(103, 'Out of limits', $error);
    }
}
