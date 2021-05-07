<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiCantEditThisKindOfMessageException extends VKApiException {
    /**
     * VKApiCantEditThisKindOfMessageException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(920, 'Can\'t edit this kind of message', $error);
    }
}
