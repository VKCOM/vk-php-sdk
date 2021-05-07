<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiOutOfLimitsException extends VKApiException {
    /**
     * VKApiOutOfLimitsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(103, 'Out of limits', $error);
    }
}
