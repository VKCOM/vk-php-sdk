<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiParamServerException extends VKApiException {
    /**
     * VKApiParamServerException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(118, 'Invalid server', $error);
    }
}
