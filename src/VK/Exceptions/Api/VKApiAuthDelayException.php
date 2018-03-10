<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiAuthDelayException extends VKApiException {
    /**
     * VKApiAuthDelayException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1112, 'Processing. Try later', $error);
    }
}
