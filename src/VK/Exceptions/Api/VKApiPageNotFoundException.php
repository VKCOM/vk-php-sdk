<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiPageNotFoundException extends VKApiException {
    /**
     * VKApiPageNotFoundException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(140, 'Page not found', $error);
    }
}
