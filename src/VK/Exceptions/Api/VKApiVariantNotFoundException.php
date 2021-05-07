<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiVariantNotFoundException extends VKApiException {
    /**
     * VKApiVariantNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1416, 'Variant not found', $error);
    }
}
