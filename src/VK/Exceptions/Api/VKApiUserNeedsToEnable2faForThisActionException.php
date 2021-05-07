<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiUserNeedsToEnable2faForThisActionException extends VKApiException {
    /**
     * VKApiUserNeedsToEnable2faForThisActionException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(704, 'User needs to enable 2FA for this action', $error);
    }
}
