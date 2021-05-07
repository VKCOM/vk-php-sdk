<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUnableToCompileCodeException extends VKApiException {
    /**
     * VKApiUnableToCompileCodeException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(12, 'Unable to compile code', $error);
    }
}
