<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiFloodException extends VKApiException {
    /**
     * VKApiFloodException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(9, 'Flood control', $error);
    }
}
