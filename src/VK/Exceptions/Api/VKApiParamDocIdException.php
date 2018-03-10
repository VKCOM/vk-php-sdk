<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiParamDocIdException extends VKApiException {
    /**
     * VKApiParamDocIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(1150, 'Invalid document id', $error);
    }
}
