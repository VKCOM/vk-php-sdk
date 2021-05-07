<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiInvalidTitleException extends VKApiException {
    /**
     * VKApiInvalidTitleException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(119, 'Invalid title', $error);
    }
}
