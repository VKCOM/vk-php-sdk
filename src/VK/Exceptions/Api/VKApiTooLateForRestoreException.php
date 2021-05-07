<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooLateForRestoreException extends VKApiException {
    /**
     * VKApiTooLateForRestoreException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1400, 'Too late for restore', $error);
    }
}
