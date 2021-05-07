<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiServersNumberLimitIsReachedException extends VKApiException {
    /**
     * VKApiServersNumberLimitIsReachedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(2000, 'Servers number limit is reached', $error);
    }
}
