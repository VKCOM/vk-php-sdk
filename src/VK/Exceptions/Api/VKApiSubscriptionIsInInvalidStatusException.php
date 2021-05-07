<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiSubscriptionIsInInvalidStatusException extends VKApiException {
    /**
     * VKApiSubscriptionIsInInvalidStatusException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1257, 'Subscription is in invalid status', $error);
    }
}
