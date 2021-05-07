<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToNoteDeniedException extends VKApiException {
    /**
     * VKApiAccessToNoteDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(181, 'Access to note denied', $error);
    }
}
