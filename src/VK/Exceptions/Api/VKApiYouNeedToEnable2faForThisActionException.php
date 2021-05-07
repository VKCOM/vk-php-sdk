<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiYouNeedToEnable2faForThisActionException extends VKApiException {
    /**
     * VKApiYouNeedToEnable2faForThisActionException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(703, 'You need to enable 2FA for this action', $error);
    }
}
