<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiLimitsOverflowForThisIntentException extends VKApiException {
    /**
     * VKApiLimitsOverflowForThisIntentException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(944, 'Limits overflow for this intent', $error);
    }
}
