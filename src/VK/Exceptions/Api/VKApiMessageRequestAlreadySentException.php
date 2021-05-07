<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiMessageRequestAlreadySentException extends VKApiException {
    /**
     * VKApiMessageRequestAlreadySentException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(939, 'Message request already sent', $error);
    }
}
