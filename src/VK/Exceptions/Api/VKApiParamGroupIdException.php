<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiParamGroupIdException extends VKApiException {
    /**
     * VKApiParamGroupIdException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(125, 'Invalid group id', $error);
    }
}
