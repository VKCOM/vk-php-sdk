<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiAccessDeniedPleaseVoteFirstException extends VKApiException {
    /**
     * VKApiAccessDeniedPleaseVoteFirstException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(253, 'Access denied please vote first', $error);
    }
}
