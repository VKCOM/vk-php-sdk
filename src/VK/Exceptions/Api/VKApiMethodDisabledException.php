<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiMethodDisabledException extends VKApiException {
    /**
     * VKApiMethodDisabledException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(23, 'This method was disabled', $error);
    }
}
