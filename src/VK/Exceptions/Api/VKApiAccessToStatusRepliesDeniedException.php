<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessToStatusRepliesDeniedException extends VKApiException {
    /**
     * VKApiAccessToStatusRepliesDeniedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(213, 'Access to status replies denied', $error);
    }
}
