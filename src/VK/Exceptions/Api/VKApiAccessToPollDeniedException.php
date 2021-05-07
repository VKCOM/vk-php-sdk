<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToPollDeniedException extends VKApiException {
    /**
     * VKApiAccessToPollDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(250, 'Access to poll denied', $error);
    }
}
