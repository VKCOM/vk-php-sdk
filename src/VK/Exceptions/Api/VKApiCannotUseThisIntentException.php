<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCannotUseThisIntentException extends VKApiException {
    /**
     * VKApiCannotUseThisIntentException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(943, 'Cannot use this intent', $error);
    }
}
