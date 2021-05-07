<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyItemsException extends VKApiException {
    /**
     * VKApiTooManyItemsException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1405, 'Too many items', $error);
    }
}
