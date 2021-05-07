<?php

namespace VK\Exceptions\Api;

use VK\Client\VKApiError;
use VK\Exceptions\VKApiException;

class VKApiTooManyRepliesException extends VKApiException {
    /**
     * VKApiTooManyRepliesException constructor.
     * @param VKApiError $error
     */
    public function __construct(VKApiError $error) {
        parent::__construct(223, 'Too many replies', $error);
    }
}
