<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyAuthAttemptsTryAgainLaterException extends VKApiException {
    /**
     * VKApiTooManyAuthAttemptsTryAgainLaterException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1105, 'Too many auth attempts try again later', $error);
    }
}
