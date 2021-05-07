<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiVkPayStatusCanNotBeChangedException extends VKApiException {
    /**
     * VKApiVkPayStatusCanNotBeChangedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1430, 'VK Pay status can not be changed', $error);
    }
}
