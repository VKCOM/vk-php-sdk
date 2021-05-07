<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiRuntimeOccurredDuringCodeInvocationException extends VKApiException {
    /**
     * VKApiRuntimeOccurredDuringCodeInvocationException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(13, 'Runtime error occurred during code invocation', $error);
    }
}
