<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiThisVideoIsAlreadyAddedException extends VKApiException {
    /**
     * VKApiThisVideoIsAlreadyAddedException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(800, 'This video is already added', $error);
    }
}
