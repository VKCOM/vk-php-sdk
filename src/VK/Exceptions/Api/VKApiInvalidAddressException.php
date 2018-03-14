<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiInvalidAddressException extends VKApiException {
    /**
     * VKApiInvalidAddressException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1260, 'Invalid screen name', $error);
    }
}
