<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiRequestException extends VKApiException {
    /**
     * VKApiRequestException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(8, 'Invalid request', $error);
    }
}
