<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiParamApiIdException extends VKApiException {
    /**
     * VKApiParamApiIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(101, 'Invalid application API ID', $error);
    }
}
