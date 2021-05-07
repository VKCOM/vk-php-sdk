<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiObjectDeletedException extends VKApiException {
    /**
     * VKApiObjectDeletedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(629, 'Object deleted', $error);
    }
}
