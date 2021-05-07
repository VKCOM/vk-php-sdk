<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiPropertyNotFoundException extends VKApiException {
    /**
     * VKApiPropertyNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1417, 'Property not found', $error);
    }
}
