<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiDonutIsDisabledException extends VKApiException {
    /**
     * VKApiDonutIsDisabledException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(225, 'Donut is disabled', $error);
    }
}
