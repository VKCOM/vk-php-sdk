<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiUnknownException extends VKApiException {
    /**
     * VKApiUnknownException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1, 'Unknown error occurred', $error);
    }
}
