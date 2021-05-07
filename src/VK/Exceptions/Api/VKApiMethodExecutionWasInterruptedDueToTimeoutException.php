<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMethodExecutionWasInterruptedDueToTimeoutException extends VKApiException {
    /**
     * VKApiMethodExecutionWasInterruptedDueToTimeoutException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(36, 'Method execution was interrupted due to timeout', $error);
    }
}
