<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUnableToProcessActionException extends VKApiException {
    /**
     * VKApiUnableToProcessActionException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(106, 'Unable to process action', $error);
    }
}
