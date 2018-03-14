<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiParamPageIdException extends VKApiException {
    /**
     * VKApiParamPageIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(140, 'Page not found', $error);
    }
}
