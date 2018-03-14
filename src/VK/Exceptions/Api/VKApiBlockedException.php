<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiBlockedException extends VKApiException {
    /**
     * VKApiBlockedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(19, 'Content blocked', $error);
    }
}
