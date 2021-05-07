<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiContactNotFoundException extends VKApiException {
    /**
     * VKApiContactNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(936, 'Contact not found', $error);
    }
}
