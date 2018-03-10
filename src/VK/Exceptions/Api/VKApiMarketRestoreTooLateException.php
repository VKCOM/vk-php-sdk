<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiMarketRestoreTooLateException extends VKApiException {
    /**
     * VKApiMarketRestoreTooLateException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1400, 'Too late for restore', $error);
    }
}
