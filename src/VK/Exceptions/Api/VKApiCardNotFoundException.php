<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCardNotFoundException extends VKApiException {
    /**
     * VKApiCardNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1900, 'Card not found', $error);
    }
}
