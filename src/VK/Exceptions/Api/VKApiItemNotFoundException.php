<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiItemNotFoundException extends VKApiException {
    /**
     * VKApiItemNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1403, 'Item not found', $error);
    }
}
