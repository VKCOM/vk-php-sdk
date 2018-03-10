<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;

class VKApiParamTitleException extends VKApiException {
    /**
     * VKApiParamTitleException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(119, 'Invalid title', $error);
    }
}
