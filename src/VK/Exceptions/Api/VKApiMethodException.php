<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMethodException extends VKApiException {
    /**
     * VKApiMethodException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(3, 'Unknown method passed', $error);
    }
}
